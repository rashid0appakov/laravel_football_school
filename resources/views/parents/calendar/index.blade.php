@extends('parents.layouts.app')

@section('content')

    <div id="page_content_inner">

        <div class="code-html">
            <div id="menu">
      <span id="menu-navi">
        <button type="button" class="btn btn-default btn-sm move-today" data-action="move-today">Today</button>
        <button type="button" class="btn btn-default btn-sm move-day" data-action="move-prev">
          <i class="calendar-icon ic-arrow-line-left" data-action="move-prev"></i>
        </button>
        <button type="button" class="btn btn-default btn-sm move-day" data-action="move-next">
          <i class="calendar-icon ic-arrow-line-right" data-action="move-next"></i>
        </button>
      </span>
                <span id="renderRange" class="render-range"></span>
            </div>

            <div id="calendar"></div>
        </div>

    </div>

@stop


@section('calendarscripts')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://uicdn.toast.com/tui.code-snippet/v1.5.2/tui-code-snippet.min.js"></script>
    <script src="https://uicdn.toast.com/tui.time-picker/v2.0.3/tui-time-picker.min.js"></script>
    <script src="https://uicdn.toast.com/tui.date-picker/v4.0.3/tui-date-picker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chance/1.0.13/chance.min.js"></script>
    <script src="/calendar/dist/tui-calendar.js"></script>
    <script src="/calendar/js/data/calendars.js"></script>
    <script src="/calendar/js/data/schedules.js"></script>
    <script type="text/javascript" class="/calendar/code-js">
        // register templates
        var templates = {
            popupIsAllDay: function() {
                return 'All Day';
            },
            popupStateFree: function() {
                return 'Free';
            },
            popupStateBusy: function() {
                return 'Busy';
            },
            titlePlaceholder: function() {
                return 'Subject';
            },
            locationPlaceholder: function() {
                return 'Location';
            },
            startDatePlaceholder: function() {
                return 'Start date';
            },
            endDatePlaceholder: function() {
                return 'End date';
            },
            popupSave: function() {
                return 'Save';
            },
            popupUpdate: function() {
                return 'Update';
            },
            popupDetailDate: function(isAllDay, start, end) {
                var isSameDate = moment(start).isSame(end);
                var endFormat = (isSameDate ? '' : 'YYYY.MM.DD ') + 'hh:mm a';

                if (isAllDay) {
                    return moment(start).format('YYYY.MM.DD') + (isSameDate ? '' : ' - ' + moment(end).format('YYYY.MM.DD'));
                }

                return (moment(start).format('YYYY.MM.DD hh:mm a') + ' - ' + moment(end).format(endFormat));
            },
            popupDetailLocation: function(schedule) {
                return 'Location : ' + schedule.location;
            },
            popupDetailUser: function(schedule) {
                return 'User : ' + (schedule.attendees || []).join(', ');
            },
            popupDetailState: function(schedule) {
                return 'State : ' + schedule.state || 'Busy';
            },
            popupDetailRepeat: function(schedule) {
                return 'Repeat : ' + schedule.recurrenceRule;
            },
            popupDetailBody: function(schedule) {
                return 'Body : ' + schedule.body;
            },
            popupEdit: function() {
                return 'Edit';
            },
            popupDelete: function() {
                return 'Delete';
            }
        };

        var cal = new tui.Calendar('#calendar', {
            defaultView: 'month',
            template: templates,
            useCreationPopup: true,
            useDetailPopup: true
        });
    </script>
    <script src="/calendar/js/default.js"></script>
@stop
