@include('admin.header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        @if(Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
        @endif
        <section class="content">
            <div class="row">
                <div class="col-6 mx-auto">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Team Member</h3>
                            <a href="{{url('admin/view/team')}}" class="btn btn-default" style="float: right">ALL Team Members</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{ Route('admin.addTeamMember') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input placeholder="Full Name" type="text" name="name" required class="form-control">
                                            <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" placeholder="Email"  name="email" required class="form-control">
                                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" placeholder="Password"  name="password" required class="form-control">
                                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password" name="confirm_password" placeholder="Confirm Password" required class="form-control">
                                            <span class="text-danger">@error('confirm_password'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Department</label>
                                            <select name="department" required id="" class="form-control">
                                                <option value="Management">Management</option>
                                                <option value="Sales">Sales</option>
                                            </select>
                                            <span class="text-danger">@error('department'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Role</label>
                                            <select name="role" required id="" class="form-control">
                                                <option value="Sales Manager">Sales Manager</option>
                                                <option value="Director of Sales">Director of Sales</option>
                                                <option value="Paid Search Specialist">Paid Search Specialist</option>
                                                <option value="Director of Marketing">Director of Marketing</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Development">Development</option>
                                                <option value="Customer Success Manager">Customer Success Manager</option>
                                                <option value="Billing and Compliance">Billing and Compliance</option>
                                            </select>
                                            <span class="text-danger">@error('role'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value='Save' class="btn btn-primary">
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->

            <!-- Modal -->
        </section>
        <!-- /.content -->
    </div>
</div>

@include('admin.footer')
