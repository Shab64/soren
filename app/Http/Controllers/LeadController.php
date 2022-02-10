<?php

namespace App\Http\Controllers;

use App\Event;
use App\File;
use App\Lead;
use App\Logs;
use App\Note;
use App\Task;
use App\TimeSheet;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Ramsey\Uuid\Type\Time;

class LeadController extends Controller{

    public function __construct()
    {
        DB::enableQueryLog(); // Enable query log

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return $this->view('index');
    }

    public function view($page, $id = null){

        $data['country_wise_leads'] = json_decode(Lead::where('is_upsell', 'No')->where(function ($q) {
            $q->orWhere('status', 'New')->orWhere('status', 'Contacted')->orWhere('status', 'Identified DM')->orWhere('status', 'Contacted DM')->orWhere('status', 'Pitched Review');
            })->select('country', DB::raw('count(*) as total'))
            ->groupBy('country')
            ->get(), true)
            ;
        $id = request()->segments();
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
        $data['total_leads'] = json_decode(Lead::get(), true);
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
        $data['logs'] = json_decode(Logs::get(), true);
        $data['converted_leads'] = json_decode(Lead::where('status', 'converted')->get(), true);
        //end
        if ($page === "calendar") {
            $data['calendar_tasks'] = json_decode(Lead::join('tasks', 'tasks.lead_id', '=', 'leads.id')
                ->Where('status', 'New')->orWhere('status', 'Contacted')->orWhere('status', 'Identified DM')->orWhere('status', 'Contacted DM')->orWhere('status', 'Pitched Review')->orWhere('status', 'Linked')
                ->orWhere('status', 'Audit / Meeting Schedule')->orWhere('status', "Presentation")->orWhere('status', 'Follow Up')->orWhere('status', 'Contract Sent')->orWhere('status', 'Converted')
                ->get(), true);
            $data['calendar_events'] = json_decode(Lead::join('events', 'events.lead_id', '=', 'leads.id')
                ->Where('status', 'New')->orWhere('status', 'Contacted')->orWhere('status', 'Identified DM')->orWhere('status', 'Contacted DM')->orWhere('status', 'Pitched Review')->orWhere('status', 'Linked')
                ->orWhere('status', 'Audit / Meeting Schedule')->orWhere('status', "Presentation")->orWhere('status', 'Follow Up')->orWhere('status', 'Contract Sent')->orWhere('status', 'Converted')
                ->get(), true);
        }
        if ($page === "timesheet" or $page === "team") {
//          for performer of the year
            $first_day = Date("Y-m-01");
            $now = date("Y-m-d");
            $data['performer'] = json_decode(User::all(), true);
            if (!empty($data['performer'])) {
                foreach ($data['performer'] as $k => $employees) {
                    $data['performer_month'] = DB::select("SELECT id,clock_in_time,clock_out_time,TIMESTAMPDIFF(SECOND , clock_in_time, clock_out_time) AS difference FROM time_sheets  WHERE  clock_in_date between '{$first_day}' and '{$now}' and  employee_id = '".$employees['id']."' ");
                    $total = 0;
                    if (!empty($data['performer_month'])) {
                        foreach ($data['performer_month'] as $x => $p) {
                            $total += $p->difference;
                            $max[] = $total;
                            $data['performer'][$k]['hours'] = $total;
                        }
                    }
                    $data['max_hours'] = (!empty($max)) ? max($max) : 0 ;
                }
            }
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
        $data['today_clocked_in'] = TimeSheet::where("clock_in_date", Date('Y-m-d'))->get();
        //upsell
        if ($page === "upsell") {
            $data['upsell'] = json_decode(Lead::where(['is_upsell' => 'Yes'])->where('status', '!=', "Deleted")->get(), true);
        }
        if ($page === "files") {
            $data['files'] = json_decode(File::orderBy('id', 'DESC')->get(), true);
        }
        $data['no_of_leads_created'] = Lead::where('is_upsell', 'No')->where(function ($q) {
            $q->orWhere('status', 'New')->orWhere('status', 'Contacted')->orWhere('status', 'Identified DM')->orWhere('status', 'Contacted DM')->orWhere('status', 'Pitched Review');
        })->count();
        $data['no_of_opportunities_created'] = Lead::where('is_upsell', 'No')->where(function ($q) {
            $q->orWhere('status', 'Linked')->orWhere('status', 'Audit / Meeting Schedule')->orWhere('status', 'Presentation');
        })->count();
        return view('admin.' . $page, $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $adminID = Auth::guard('admin')->user()->id;

        $validated = $request->validate([
            'company' => 'required|max:255',
            'f_name' => 'required',
            'l_name' => 'required',
            'title' => 'required',
            'email' => 'required',
            'country' => 'required',
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
                $lead->adder_id = $adminID;
                $lead->adder_type = 'Admin';
                $lead->company = $request->company;
                $lead->f_name = $request->f_name;
                $lead->l_name = $request->l_name;
                $lead->title = $request->title;
                $lead->email = $request->email;
                $lead->country = $request->country;
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
                return redirect()->route('admin.view.page', ['all-leads'])->with('success', 'Lead Added Successfully!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Lead $lead
     * @return \Illuminate\Http\Response
     */

    public function show(Lead $lead)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Lead $lead
     * @return \Illuminate\Http\Response
     */

    public function edit(Lead $lead){
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Lead $lead
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){
        unset($request['_token']);
        Lead::where(['id' => $id])->update($request->all());
        return redirect()->route('admin.view.page', ['all-leads'])->with('success', 'Lead Added Successfully!');
    }

    public function accountStatus(Request $request)
    {
        unset($request['_token']);
        Lead::where(['id' => $request->input('leadID')])->update([$request['type'] => $request['status']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Lead $lead
     * @return \Illuminate\Http\Response
     */

    public function delete_permanently(Request $request, $id){
        Lead::where(['id' => $id])->delete($request->all());
        return redirect()->route('admin.view.page', ['lost'])->with('success', 'Lead Deleted Successfully!');
    }

    public function destroy(Lead $lead, $id)
    {
        $lead = Lead::find($id);
        $lead->status = "Deleted";
        $lead->save();
        return redirect()->route('admin.view.page', ['all-leads'])->with('success', 'Lead Deleted Successfully!');
    }

    public function checkedTask(Request $request)
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

    public function checkedEvent(Request $request)
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

    public function sendMailAndRedirect(Request $request)
    {
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;
        $leadID = $request->lead_id;

        $this->sendMail($email, $subject, $message);

        return redirect()->route('admin.view.pageID', ['lead-view', $leadID])->with('email_success', 'Email Send Successfully!');
    }

    //sendMail

    public function sendMail($to, $subject, $message)
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'mail.devlabx.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                  //Enable SMTP authentication
            $mail->Username = 'shahab@jetnetix.com';                     //SMTP username
            $mail->Password = 'engineering644';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('shahab@jetnetix.com', 'AdSearch');
            $mail->addReplyTo('hello@adsearch.com', 'AdSearch');
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

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $remember_me = $request->has('remember_me');
//      $creds = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me)) {
            return redirect()->route('admin.index');
        } else {
            return back()->with('fail', 'Invalid Credentials');
        }
    }

    public function convertToUpsell(Request $request, $id)
    {
        Lead::where("id", $id)->update(['upsell_status' => 'identified', 'is_upsell' => 'Yes']);
        return redirect('admin/view/all-opp');
    }

    public function insertNote(Request $request)
    {
        $notes = new Note();
        $notes->owner_id = Auth::guard('admin')->user()->id;
        $notes->note = $request->note;
        $notes->type = 'Admin';
        $notes->save();
        return redirect()->route('admin.view.page', ['notes'])->with('note_success', 'Note Added Successfully!');
    }

    public function deleteNote(Request $request)
    {
        $noteID = $request->input('note_id');
        $note = Note::find($noteID);
        $note->delete();
        return redirect()->route('admin.view.page', ['notes'])->with('note_success', 'Note Deleted Successfully!');
    }

    public function deleteUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.view.page', ['team'])->with('note_success', 'Member Deleted Successfully!');
    }

    public function uploadFile(Request $request)
    {
        //$file = File
        $file = new File();
        $file->owner_id = Auth::guard('admin')->user()->id;
        $file->type = 'Admin';
        $fileRequest = $request->file('file');
        // var_dump($fileRequest, $_FILES['file']['name'],$fileRequest->getClientOriginalName());
        // die;
        if (isset($fileRequest)) {
            $file_name = $fileRequest->getClientOriginalName();
            $fileName = $fileRequest->storeAs('/', $file_name, 'uploads'); //this disk name uploads added by me in config/filesystem uploads[]
            $file->name = $fileName;
            $file->save();
            return redirect()->route('admin.view.page', ['files'])->with('upload_success', 'File Uploaded Successfully!');
        }
        return redirect()->route('admin.view.page', ['files'])->with('upload_fail', 'File Uploading Failed!');
    }

    public function download(Request $request)
    {
        $file_name = $request->file_name;
        $file_path = public_path('uploads/' . $file_name);
        // $type = 'application/jpg';
        // $headers = array('content-type', $type);
        // var_dump($file_path); die;
        return response()->download($file_path);
    }

    public function addEvent(Request $request)
    {
        $event = new Event();
        $event->lead_id = $request->lead_id;
        $event->event = $request->event;
        $event->date = $request->date;
        $event->is_complete = 'No';
        $event->save();

        return redirect()->route('admin.view.pageID', ['lead-view', $request->lead_id])->with('event_success', 'Event Added Successfully!');
    }

    public function changeLeadStatus(Request $request)
    {
        $adminID = Auth::guard('admin')->user();
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

        //keeping record of the every changes
        $current = $currentStats[0]['status'];
        $modified = $lead->status;
        $logs['admin_id'] = $adminID->id;
        $logs['user_id'] = 0;
        $logs['message'] = $adminID->name . ' has updated the lead status from ' . $current . ' to ' . $modified;
        Logs::create($logs);
        if ($modified === 'Linked') {
            $logs['message'] = 'Great! Lead is converted to Opportunity';
            Logs::create($logs);
        }
    }

    public function changeInnerLead(Request $request)
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

    public function changeUpsellStage(Request $request)
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

    public function updateTempStages(Request $request)
    {
        try {
            if (!empty($request->stages)) {
                $statusArr = ['New', 'Contacted', 'Identified', 'Contacted DM', 'Pitched Review', 'Linked', 'Audit / Meeting Schedule', 'Presentation', 'Follow Up', 'Contract Sent', 'Converted'];
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
        return redirect()->route('admin.view.pageID', ['lead-view', $request->leadID]);
    }

    //May Only Admin Functions

    public function addMember(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
            'department' => 'required',
            'role' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->department = $request->department;
        $user->role = $request->role;
        $user->save();

        if ($user) {
            return redirect()->back()->with('success', 'Member Added Successfully!');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register!');
        }
    }

    public function timeSheetReport(Request $request)
    {
        $employeeID = $request->employeeID;
        $timesheets = json_decode(TimeSheet::where('employee_id', $employeeID)->orderBy("id", "DESC")->get(), true);
        $lastPunchIn = json_decode(TimeSheet::select('*')->where('employee_id', $employeeID)->orderBy("clock_in_time", "DESC")->limit(1)->get(), true);

        //total hour today
        $totalHours = 0;
        $todayTimes = json_decode(TimeSheet::where('employee_id', $employeeID)->where('clock_in_date', Date('Y-m-d'))->get(), true);
        if (isset($todayTimes[0]['clock_out_time']) && isset($todayTimes[0]['clock_in_time'])) {
            $totalHours = round((strtotime($todayTimes[0]['clock_out_time']) - strtotime($todayTimes[0]['clock_in_time'])) / 3600, 1);
        }

        //Total Hours This Month
        $monthlyTotalHours = 0;
        $totalOfficeHours = 0;
        $currentDate = Date('Y-m-d');
        $previousMonthDate = Date('Y-m-d', strtotime(Date('Y-m-d') . '-30 days'));
        $monthlyReport = json_decode(TimeSheet::where('employee_id', $employeeID)->where('clock_in_date', '>=', $previousMonthDate)->get(), true);
        if (!empty($monthlyReport)) {
            foreach ($monthlyReport as $report) {
                if (isset($report['clock_in_time']) && $report['clock_out_time']) {
                    $monthlyTotalHours += round((strtotime($report['clock_out_time']) - strtotime($report['clock_in_time'])) / 3600, 1);
                }
            }
        }

        return view('admin.timesheet-details', compact(['timesheets', 'lastPunchIn', 'totalHours', 'monthlyTotalHours']));
    }

    public function punchTime(Request $request)
    {
        $punch = $request->punch;
        $employeeID = $request->employeeID;
        $employee = User::find($employeeID);
        $todayRecord = json_decode(TimeSheet::where('employee_id', $employeeID)->where('clock_in_date', Date('Y-m-d'))->get(), true);

        if ($punch === "Out") {
            TimeSheet::where('employee_id', $employeeID)->where('clock_in_date', Date('Y-m-d'))->update(['clock_out_time' => Date('h:i')]);
            $employee->clocked_status = 'Clocked Out';
        } else if ($punch === "In") {
            if (empty($todayRecord)) {
                $timeSheet = new TimeSheet();
                $timeSheet->employee_id = $employeeID;
                $timeSheet->clock_in_time = Date('h:i');
                $timeSheet->clock_in_date = Date('Y-m-d');
                $timeSheet->save();
            } else {
                TimeSheet::where('employee_id', $employeeID)->where('clock_in_date', Date('Y-m-d'))->update(['clock_in_time' => Date('h:i')]);
            }
            $employee->clocked_status = 'Clocked In';
        }
        $employee->save();
    }

    public function updateTime(Request $request)
    {
        $timeID = $request->timeID;
        $clockedInTime = $request->clockedInTime;
        $clockedOutTime = $request->clockedOutTime;

        $timeSheet = TimeSheet::find($timeID);
        $timeSheet->clock_in_time = $clockedInTime;
        $timeSheet->clock_out_time = $clockedOutTime;
        $timeSheet->save();
    }

    public function test()
    {
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}

