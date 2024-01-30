@extends('layouts.app')
@section('title')
    {{__('Event Calendar')}}
@endsection

@section('datatable_style')
    @include('partials.datatable_styles')
@endsection

@section('breadcrumb')

<!-- Add this modal to your HTML -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="successModalLabel">Success</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Event Created Successfully
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Event Calendar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Event Calendar</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div id="calendar"></div>
    
@endsection

@section('user_manage_list')
    menu-is-opening menu-open
@endsection

@section('user_manage')
    active
@endsection

@section('all_user')
    active
@endsection

@section('content')

{{-- <div id="calendar"></div> --}}

@endsection

@section('scripts')
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <script>
    $(document).ready(function () {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      var calendar = $('#calendar').fullCalendar({
        editable: true,
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        events: '/full-calender',
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {

          // Check if the current view is month, and prevent selection
    if (calendar.fullCalendar('getView').name === 'month') {
      calendar.fullCalendar('unselect');
      return;
    }

          var title = prompt('Event Title:');

          if (title) {
            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

            $.ajax({
              url: "/full-calender/action",
              type: "POST",
              data: {
                title: title,
                start: start,
                end: end,
                type: 'add'
              },
              success: function (data) {
                calendar.fullCalendar('refetchEvents');
                showMessage("Event Created Successfully");
              }
            });
          }
        },
        editable: true,
        eventResize: function (event, delta) {
          var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
          var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
          var title = event.title;
          var id = event.id;
          $.ajax({
            url: "/full-calender/action",
            type: "POST",
            data: {
              title: title,
              start: start,
              end: end,
              id: id,
              type: 'update'
            },
            success: function (response) {
              calendar.fullCalendar('refetchEvents');
              showMessage("Event Updated Successfully");
            }
          });
        },
        eventDrop: function (event, delta) {
          var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
          var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
          var title = event.title;
          var id = event.id;
          $.ajax({
            url: "/full-calender/action",
            type: "POST",
            data: {
              title: title,
              start: start,
              end: end,
              id: id,
              type: 'update'
            },
            success: function (response) {
              calendar.fullCalendar('refetchEvents');
              showMessage("Event Updated Successfully");
            }
          });
        },
        eventClick: function (event) {
          if (confirm("Are you sure you want to remove it?")) {
            var id = event.id;
            $.ajax({
              url: "/full-calender/action",
              type: "POST",
              data: {
                id: id,
                type: "delete"
              },
              success: function (response) {
                calendar.fullCalendar('refetchEvents');
                showMessage("Event Deleted Successfully");
              }
            });
          }
        }
      });

      function showMessage(message) {
        $('#messageText').text(message);
        $('#messageModal').modal('show');
      }
    });
  </script>
    
@endsection

@section('datatable_script')
    @include('partials.datatable_script')
@endsection