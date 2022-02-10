<?php

namespace App\Http\Controllers;

use App\Logs;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Event;
use App\File;
use App\Lead;
use App\Note;
use App\Task;
use App\TimeSheet;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmployeeController extends Controller
{
    //
    function index()
    {
        return $this->view('index');
    }

    public function view($page, $id = null)
    {
        $data['country_wise_leads'] = json_decode(Lead::where('is_upsell', 'No')->where(function ($q) {
            $q->orWhere('status', 'New')->orWhere('status', 'Contacted')->orWhere('status', 'Identified DM')->orWhere('status', 'Contacted DM')->orWhere('status', 'Pitched Review');
        })->select('country', DB::raw('count(*) as total'))
            ->groupBy('country')
            ->get(), true)
        ;
        $id =  request()->segments();
        if (!empty($id[3])) {
            $data['lead_id'] = json_decode(Lead::where(['id' => $id[3]])->get(), true);
            $task = json_decode(Task::where(['lead_id' => $id[3]])->get(), true);
            if (!empty($task)) {
                foreach ($task as $k => $val) {
                    $data['lead_id'][$k]['lead_task'] = $task;
                }
            }

            $data['events'] = json_decode(Event::where(['lead_id' => $id[3]])->get(), true);
        }
        $data['total_leads'] = json_decode(Lead::get(),true);
        $data['all_leads'] = json_decode(Lead::where('is_upsell', 'No')->where(function ($q) {
            $q->orWhere('status', 'New')->orWhere('status', 'Contacted')->orWhere('status', 'Identified DM')->orWhere('status', 'Contacted DM')->orWhere('status', 'Pitched Review');
        })->get(), true);
        $data['opportunity_leads'] = json_decode(Lead::where('is_upsell', 'No')->where(function ($q) {
            $q->orWhere('status', 'Linked')->orWhere('status', 'Audit / Meeting Schedule')->orWhere('status', 'Presentation');
        })->get(), true);
        $data['intakeandonboarding_leads'] = json_decode(Lead::where('is_upsell', 'No')->where(function ($q) {
            $q->orWhere('status', 'Follow Up');
        })->get(), true);
        $data['compliance_leads'] = json_decode(Lead::where('is_upsell', 'No')->where(function ($q) {
            $q->orWhere('status', 'Contract Sent')->orWhere('status', 'Converted');
        })->get(), true);
        $data['lost_leads'] = json_decode(Lead::where(['status' => 'Deleted'])->get(), true);

        if ($page === "notes") {
            $data['notes'] = json_decode(Note::orderBy('id', 'DESC')->get(), true);
            if (!empty($data['notes'])) {
                foreach ($data['notes'] as $k => $note) {
                    if ($note['type'] === 'User') {
                        // $data['notes'][$k]['owner_id'] = json_decode(User::where('id', $note['owner_id'])->get(['id', 'name']), true);
                    }
                }
            }
        }
        //shahab
        $data['logs'] = json_decode(Logs::get(),true);
        $data['converted_leads'] = json_decode(Lead::where('status','converted')->get(),true);
        //end

        if ($page === "calendar") {
            $data['calendar_tasks'] = json_decode(Lead::join('tasks', 'tasks.lead_id', '=', 'leads.id')
                ->Where([
                    'status' => 'New', 'status' => 'Contacted', 'status' => 'Identified DM', 'status' => 'Contacted DM', 'status' => 'Pitched Review', 'status' => 'Linked',
                    'status' => 'Audit / Meeting Schedule', 'status' => "Presentation", 'status' => 'Follow Up', 'status' => 'Contract Sent', 'status' => 'Converted'
                ])->get(), true);
            $data['calendar_events'] = json_decode(Lead::join('events', 'events.lead_id', '=', 'leads.id')
                ->Where([
                    'status' => 'New', 'status' => 'Contacted', 'status' => 'Identified DM', 'status' => 'Contacted DM', 'status' => 'Pitched Review', 'status' => 'Linked',
                    'status' => 'Audit / Meeting Schedule', 'status' => "Presentation", 'status' => 'Follow Up', 'status' => 'Contract Sent', 'status' => 'Converted'
                ])
                ->get(), true);
        }

        if ($page === "timesheet") {
            $data['employees_time'] = json_decode(User::all(), true);
            if (!empty($data['employees_time'])) {
                foreach ($data['employees_time'] as $k => $employeeTime) {
                    $present = json_decode(TimeSheet::where('employee_id', $employeeTime['id'])->where('clock_in_date', Date('Y-m-d'))->get(), true);
                    $data['employees_time'][$k]['present'] = empty($present) ? 'No' : 'Yes';
                }
            }
            $data['total_employees'] = User::all()->count();
        }

        $data['total_employees_count'] = User::all()->count();
        $data['total_notes_count'] = Note::all()->count();
        $data['total_files_count'] = File::all()->count();
        $data['total_employees_count'] = User::all()->count();
        $data['today_clocked_in'] = TimeSheet::where("clock_in_date",Date('Y-m-d'))->get();


        //upsell
        if ($page === "upsell") {
            $data['upsell'] = json_decode(Lead::where(['is_upsell' => 'Yes'])->where('status', '!=', "Deleted")->get(), true);
        }

        if ($page === "files") {
            $data['files'] = json_decode(File::orderBy('id', 'DESC')->get(), true);
        }

        //-------
        $data['no_of_leads_created'] = Lead::where('is_upsell', 'No')->where(function ($q) {
            $q->orWhere('status', 'New')->orWhere('status', 'Contacted')->orWhere('status', 'Identified DM')->orWhere('status', 'Contacted DM')->orWhere('status', 'Pitched Review');
        })->count();

        $data['no_of_opportunities_created'] = Lead::where('is_upsell', 'No')->where(function ($q) {
            $q->orWhere('status', 'Linked')->orWhere('status', 'Audit / Meeting Schedule')->orWhere('status', 'Presentation');
        })->count();

        return view('employees.' . $page, $data);
    }

    public function store(Request $request)
    {

        $employeeID = Auth::guard('web')->user()->id;

        $validated = $request->validate([
            'company' => 'required|max:255',
            'f_name' => 'required',
            'l_name' => 'required',
            'title' => 'required',
            'email' => 'required',
            'status' => 'required',
            'f_date' => 'required',
            'time' => 'required',
            'phone' => 'required',
            'a_phone' => 'required',
            'time_zone' => 'required',
            'website' => 'required',
            'gate_keeper_name' => 'required',
            'source' => 'required',
            'industry' => 'required',
            'marketing_partner' => 'required',
            'industry_details' => 'required',
            'cd' => 'required',
            'other' => 'required',
            'ad_spend' => 'required',
        ]);

        if ($validated) {
            if (!empty($request)) {
                $request->request->remove('_token');
                $lead = new Lead();
                $lead->adder_id = $employeeID;
                $lead->adder_type = 'Employee';
                $lead->company = $request->company;
                $lead->f_name = $request->f_name;
                $lead->l_name = $request->l_name;
                $lead->title = $request->title;
                $lead->email = $request->email;
                $lead->status = $request->status;
                $lead->f_date = $request->f_date;
                $lead->time = $request->time;
                $lead->phone = $request->phone;
                $lead->a_phone = $request->a_phone;
                $lead->time_zone = $request->time_zone;
                $lead->website = $request->website;
                $lead->gate_keeper_name = $request->gate_keeper_name;
                $lead->source = $request->source;
                $lead->industry = $request->industry;
                $lead->industry_details = $request->industry_details;
                $lead->other = $request->other;
                $lead->marketing_partner = $request->marketing_partner;
                $lead->cd = $request->cd;
                $lead->ad_spend = $request->ad_spend;
                $lead->save();
                return redirect()->route('employee.view.page', ['all-leads'])->with('success', 'Lead Added Successfully!');
            }
        }
    }

    function check(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('employee.index');
        } else {
            return back()->with('fail', 'Invalid Credentials');
        }
    }

    function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email', //unique:users,email check the uniques email from users
            //table and the email column
            'password' => 'required|min:8|max:30',
            'cpassword' => 'required|min:8|max:30|same:password'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($user) {
            return redirect()->back()->with('success', 'You are now register successfully');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register');
        }
    }

    function checkedTask(Request $request)
    {
        $checked = $request->checked;
        $task = Task::find($request->taskID);
        if ($checked === "true") {
            $task->is_complete = 'Yes';
        } else {
            $task->is_complete = 'No';
        }
        $task->save();
        // redirect()->to(url('admin/lead-view/{{ $request->taskID }}'));
    }

    function checkedEvent(Request $request)
    {
        $checked = $request->checked;
        $event = Event::find($request->eventID);
        if ($checked === "true") {
            $event->is_complete = 'Yes';
        } else {
            $event->is_complete = 'No';
        }
        $event->save();
        // redirect()->to(url('admin/lead-view/{{ $request->taskID }}'));
    }

    function sendMailAndRedirect(Request $request)
    {
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;
        $leadID = $request->lead_id;

        $this->sendMail($email, $subject, $message);

        return redirect()->route('employee.view.pageID', ['lead-view', $leadID])->with('email_success', 'Email Send Successfully!');
    }

    //sendMail
    function sendMail($to, $subject, $message)
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.devlabx.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                  //Enable SMTP authentication
            $mail->Username   = 'shahab@jetnetix.com';                     //SMTP username
            $mail->Password   = 'engineering644';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('shahab@jetnetix.com', 'Ad Search');
            $mail->addReplyTo('hello@adsearch.com', 'Ad Search');
            $mail->addAddress($to);  //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $message;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';
            // return redirect($redirect);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            die;
        }
    }
    function accountStatus(Request $request){
        unset($request['_token']);
        Lead::where(['id' => $request->input('leadID')])->update([$request['type']=>$request['status']]);
    }

    function insertNote(Request $request)
    {
        $notes = new Note();
        $notes->owner_id = Auth::guard('web')->user()->id;
        $notes->note = $request->note;
        $notes->type = 'Employee';
        $notes->save();
        return redirect()->route('employee.view.page', ['notes'])->with('note_success', 'Note Added Successfully!');
    }

    function deleteNote(Request $request)
    {
        $noteID = $request->input('note_id');
        $note = Note::find($noteID);
        $note->delete();
        return redirect()->route('employee.view.page', ['notes'])->with('note_success', 'Note Deleted Successfully!');
    }

    function uploadFile(Request $request)
    {
        //$file = File
        $file = new File();
        $file->owner_id = Auth::guard('web')->user()->id;
        $file->type = 'Employee';
        $fileRequest = $request->file('file');
        // var_dump($fileRequest, $_FILES['file']['name'],$fileRequest->getClientOriginalName());
        // die;
        if (isset($fileRequest)) {
            $file_name = $fileRequest->getClientOriginalName();
            $fileName = $fileRequest->storeAs('/', $file_name, 'uploads'); //this disk name uploads added by me in config/filesystem uploads[]
            $file->name = $fileName;
            $file->save();
            return redirect()->route('employee.view.page', ['files'])->with('upload_success', 'File Uploaded Successfully!');
        }
        return redirect()->route('employee.view.page', ['files'])->with('upload_fail', 'File Uploading Failed!');
    }

    function addEvent(Request $request)
    {
        $event = new Event();
        $event->lead_id = $request->lead_id;
        $event->event = $request->event;
        $event->date = $request->date;
        $event->is_complete = 'No';
        $event->save();

        return redirect()->route('employee.view.pageID', ['lead-view', $request->lead_id])->with('event_success', 'Event Added Successfully!');
    }

    function changeLeadStatus(Request $request)
    {
        $statusArr = ['New', 'Contacted', 'Identified DM', 'Contacted DM', 'Pitched Review', 'Linked', 'Audit / Meeting Schedule', 'Presentation', 'Follow Up', 'Contract Sent', 'Converted'];
        $currentStats = json_decode(Lead::select('status')->where('id', $request->leadID)->get(), true);
        $key = array_search($currentStats[0]['status'], $statusArr);
        $leadID = $request->leadID;
        $lead = Lead::find($leadID);
        if ($key < (sizeof($statusArr) - 1)) {
            $lead->status = $statusArr[$key + 1];
            if ($statusArr[$key + 1] === "Follow Up") {
                $lead->followup_status = 'Order Notes';
                echo "reload";
            }
        } else {
            $lead->is_complete = 'Yes';
        }
        $lead->save();
    }

    function changeInnerLead(Request $request)
    {
        $statusArr1 = ["Order Notes", "Schedule Intake Call", "Welcome Email", "Intake", "Build", "Upload", "Web Access", "GTM", "Conversation Actions", "Display Campaign", "Introduction Email", "Launch Call", "Notify Billing", "Set Rebill Date", "Full Review"];
        $currentStats = json_decode(Lead::select('followup_status')->where('id', $request->leadID)->get(), true);
        $key = array_search($currentStats[0]['followup_status'], $statusArr1);
        // var_dump($currentStats[0]['status'],$key); die;
        $leadID = $request->leadID;
        if ($key < (sizeof($statusArr1) - 1)) {
            $lead = Lead::find($leadID);
            $lead->followup_status = $statusArr1[$key + 1];
            if ($statusArr1[$key + 1] === "Full Review") {
                $lead->status = 'Contract Sent';
                echo "reload";
            }
            $lead->save();
        }
    }

    function changeUpsellStage(Request $request)
    {
        $statusArr1 = ["Identified", "Pitched", "Follow Up", "Converted"];
        $currentStats = json_decode(Lead::select('upsell_status')->where('id', $request->leadID)->get(), true);
        $key = array_search($currentStats[0]['upsell_status'], $statusArr1);
        // var_dump($currentStats[0]['status'],$key); die;
        $leadID = $request->leadID;
        if ($key < (sizeof($statusArr1) - 1)) {
            $lead = Lead::find($leadID);
            $lead->upsell_status = $statusArr1[$key + 1];
            $lead->save();
        } else {
            $lead = Lead::find($leadID);
            $lead->upsell_complete = "Yes";
            $lead->save();
        }
    }

    function updateTempStages(Request $request)
    {
        try {
            if (!empty($request->stages)) {
                $statusArr = ['New','Contacted','Identified','Contacted DM','Pitched Review', 'Linked', 'Audit / Meeting Schedule', 'Presentation','Follow Up','Contract Sent','Converted'];
                $stages = array();
                $lead = Lead::find($request->leadID);
                foreach ($request->stages as $k => $stage) {
                    $stages[$statusArr[$k]] = $stage;
                }
                $lead->temp_status = json_encode($stages);
                $lead->save();
            }
        } catch (Exception $err) {
            die;
        }
        return redirect()->route('employee.view.pageID', ['lead-view', $request->leadID]);
    }

    function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('employee.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead, $id)
    {
        unset($request['_token']);

        Lead::where(['id' => $id])->update($request->all());
        return redirect('employee/leads')->with('success', 'Lead Updated Successfully!');
    }

    public function destroy(Lead $lead, $id)
    {
        // Lead::where(['id' => $id])->delete($lead->all());
        // Event::where('lead_id', $id)->delete();
        // Task::where('lead_id', $id)->delete();
        $lead = Lead::find($id);
        $lead->status = "Deleted";
        $lead->save();
        return redirect()->route('employee.view.page', ['all-leads'])->with('success', 'Lead Deleted Successfully!');
    }


    /// Password Change Methods  Laravel
    function sendPassChangeLink(Request $request)
    {
        $data = json_decode(User::where('email', $request->email)->get(), true);
        if (!empty($data)) {
            //Create Expire Time, Key and email of requester
            $currentDate = Date('Y-m-d H:i:s');
            $oneHourLate = Date('Y-m-d H:i:s', strtotime($currentDate . '+1 hour'));
            $token = bin2hex(openssl_random_pseudo_bytes(16));
            // $tokenData = array(
            //     'password_token_expiry' => $oneHourLate,
            //     'password_token' => $token,
            //     'pass_token_status' => 'Active'
            // );

            // $this->data->update('users', array('id' => $data[0]['id']), $tokenData);
            $user = User::find($data[0]['id']);
            $user->password_token_expiry = $oneHourLate;
            $user->password_token = $token;
            $user->pass_token_status = 'Active';
            $user->save();

            $encodeID = urlencode(base64_encode($data[0]['id']));

            // Update Token, Status, expiredDate and Send Link On Email
            $link = route('passChangeForm', [$encodeID, $token]); //Send this link to user email address

            //password change link email template
            $message = '<table align="center"  border="0" cellspacing="0" cellpadding="0" class="em_main_table" style="width:70vw; height: 500px; " >
              <tr style="color:#000000; height: 300px; text-align: center; width: 80%; margin: 0 auto; " >
                <th style="padding: 20px 220px; ">

                    <div style="border: 1px solid #0000001c;  padding: 30px; text-align: center">
                        <div style="display: flex; margin-top: 20px;">
                            <div style="width: 260px; margin: 0 auto;">
                                <img src="' . asset('assets/images/logo.png') . '" style="border-radius: 6px; width: 100%; height: 70px; margin-bottom: 20px ;padding:10px; background-color:#922f5e " alt=""/>
                            </div>
                        </div>
                        <div style="text-transform: uppercase;  font-weight: normal; line-height: 40px;  ">
                            <h2 style="width: 100%; height: 50px; color: #922f5e ; margin-top : 10px; padding: 3px; padding-top: 10px; font-family: cursive; " >Forgot Your Password?</h2>
                        </div>
                        <div style="font-family: cursive ; margin-top: 14px; font-weight: 400;">
                            <a href="' . $link . '">Click here to reset your password</a>
                        </div>
                    </div>
                </th>
               </tr>
            </table>';

            $subject = 'Password Change Request For AdSearch User Panel';

            $email = $request->email;

            $this->sendMail($email, $subject, $message);

            return redirect()->route('employee.login')->with('send_success', 'Link Send Successfully,Check Your Email Address!');
        }
        return redirect()->route('employee.forgot_password')->with('send_error', 'Provided Email Not Found In Our Record');
    }

    function passChangeForm($e_userID, $pass_token)
    {
        if (isset($e_userID) && isset($pass_token)) {
            $d_userID = base64_decode(urldecode($e_userID));
            $userData = json_decode(User::where('id', $d_userID)->get(), true);
            $currentDate = Date('Y-m-d H:i:s');
            $expiryDate = Date("Y-m-d H:i:s", strtotime($userData[0]['password_token_expiry']));
            if (isset($userData[0]['password_token']) && ($userData[0]['password_token'] === $pass_token) && ($currentDate <= $expiryDate) && $userData[0]['pass_token_status'] === 'Active') {
                //show Form for New Password
                $arrayData = array(
                    'e_uid' => $e_userID
                );
                //password change From Here
                return view('password_change_form', $arrayData);
            } else if ($currentDate > $expiryDate || $userData[0]['pass_token_status'] === 'Expired') {
                echo '
                      <div style="display: flex; justify-content: center; align-items: center; align-self: center; height: 100%; width: 100%; border: 2px solid white;">
                            <div style="box-shadow: 0px 0px 2px black;background: #ff4e00; padding: 10em 10em; border-radius: 10px;">
                                 <h1 style="color: white; text-align-last: center;">Oops !</h1>
                                 <h3 style="color: white; text-align-last: center;">link Expired! Please Resend the Password Change Request.</h3>
                                 <div style="text-align: -webkit-center; margin: 2rem 0; ">
                                     <a style="color: white ; text-decoration: none; border: 3px solid white;padding: 7px 13px; border-radius: 20px ; text-align-last: center; " href="' . base_url('user') . '">Sign In Now</a>
                                 </div>
                            </div>
                      </div>';
            } else if ($userData[0]['password_token'] !== $pass_token) {
                echo '
                      <div style="display: flex; justify-content: center; align-items: center; align-self: center; height: 100%; width: 100%; border: 2px solid white;">
                           <div style="box-shadow: 0px 0px 2px black;background: #ff4e00; padding: 10em 10em; border-radius: 10px;">
                               <h1 style="color: white; text-align-last: center;">Oops !</h1>
                               <h3 style="color: white; text-align-last: center;">Link Not Found Please Recheck Your Email and retry</h3>
                               <div style="text-align: -webkit-center; margin: 2rem 0; ">
                                   <a style="color: white ; text-decoration: none; border: 3px solid white;padding: 7px 13px; border-radius: 20px ; text-align-last: center; " href="' . base_url('user') . '">Sign In Now</a>
                               </div>
                           </div>
                      </div>';
            }
        }
    }

    function changePass(Request $request)
    {
        $d_userID = base64_decode(urldecode($request->e_uid));
        $user = $this->data->fetch('users', array('id' => $d_userID));
        $user = json_decode(User::where('id', $d_userID)->get(), true);
        if (!empty($user) && $user[0]['pass_token_status'] === 'Active') {
            $user = User::find($d_userID);
            $user->password = Hash::make($request->password);
            $user->pass_token_status = 'Expired';
            $user->save();
            $this->session->set_flashdata('success', array('Success', 'Password Successfully Changed', 'success'));
        } else {
            $this->session->set_flashdata('success', array('Error', 'Password Not Change,Link Expired', 'error'));
        }
        return redirect()->route('employee.login');
    }
}
