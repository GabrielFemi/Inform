@extends('layouts.app')

@section('content')
<div class="page-content-wrapper ">

                        <div class="container-fluid">
                            <!-- Only for root users -->
                            @if ($current_user->role_id  == 0)

                           

                            <div class="container text-center">

                                <h5>Inbox</h5>

                            </div>
                            

                            <!-- These are all the personal messages... -->

                            <!-- If there are no messages-->
                            @if ( count ($personal_messages) == 0)
                                <div class="card mx-3 py-3 px-3 ">
                                    <h5><code>No messages here, <span style = "text-transform: capitalize">{{Auth::user()->name}}</span></code> <a href="/"><button class="btn btn-primary waves-effect waves-light">Go home</button></a></h5>
                                    
                                </div>
                            @endif

                            @foreach ($personal_messages as $personal_message)

                            <div class="card mx-3 py-3">

                                <code class="card-header"><h5>{{ $personal_message->created_at }}</h5></code>
                                <div class="card-body">
                                    <p>{{ $personal_message->message }}</p>
                                    <hr>
                                    <p>Sent by: {{ $personal_message->sent_by }}</p>
                                    <input type="button" class="btn btn-success" value="Reply" id = "reply_button">
                                    <br>
                                    <div class = "reply_form" id="reply_form">
                                        <textarea id = "reply_textarea" class="my-3"></textarea>
                                        <br>
                                        <code>Submit<span class="fab fa-telegram-plane"></span></code>
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach
                            @else
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box">
                                        <div class="btn-group float-right">
                                            <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item"><a href="#">{{ config('app.name', 'Laravel') }}</a></li>
                                            <li style= "text-transform: capitalize" class="breadcrumb-item active">{{ Request::path() }}</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Send message to Admin</h4>
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- end page title end breadcrumb -->
                            
                            <div>
                                Welcome, {{ Auth::user()->name }}, send a message to the class.
                            </div>    



                            <!--Add students form-->
                            <div class="wrapper-page">
                                
                                <div class="card col-">

                                    <div class="card-body">
                                        
                                        <div class="col-xl-12 px-3 pb-3">
                                            @include('inc.messages')
                                        <form class="form-horizontal m-t-20" action="{{ route('personal_message_to_admin') }}" method="POST" name="personal_message_form">
                                                @csrf
                                                
                                                
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                    <textarea name = "message" class="form-group col-12" rows="4" placeholder="Enter your message to Admin">{{ old('message') }}</textarea>
                                                    </div>
                                                </div>
                        
                                                <div class="form-group text-center row m-t-20">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Send Message</button>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            
            
                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->
                

                <footer class="footer">
                    © 2019 Inform by <a href="https://github.com/GabielFemi" target="_blank">Gabriel Akinyosoye.</a>
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script>
            document.persoanl_message_form.message.focus();
        </script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>

        <script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        
        <script src="assets/plugins/skycons/skycons.min.js"></script>
        <script src="assets/plugins/fullcalendar/vanillaCalendar.js"></script>
        
        <script src="assets/plugins/raphael/raphael-min.js"></script>
        <script src="assets/plugins/morris/morris.min.js"></script> 
         
        <script src="assets/pages/dashborad.js"></script>
        <!-- App js -->
        <script src="assets/js/app.js"></script>
@endsection