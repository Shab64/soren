@include('admin.header')
<link rel="stylesheet" href="{{ asset('assets/fc/fullcalendar.css') }}">
<style>
  .dropdown .dropdown-toggle {
    width: 120px
  }

  #calendarTypeName {
    color: #2196f3
  }

  #menu-navi .btn-default {
    color: #098af0;

  }

  #menu .dropdown .btn-default,
  #menu .move-today,
  #menu .move-day {
    border: 1px solid #dde7ff;

  }

  .tui-full-calendar-popup-section-item {
    padding: 0 6px 0 12px;
  }

  .tui-full-calendar-section-title {
    width: auto;
  }

  .tui-full-calendar-confirm {
    background-color: #03a9f4;
  }
</style>
<style>
  table {
    text-align: center;
    /* height: 100px; */
  }

  .fc-button,
  .fc-agendaWeek-button {
    background: #4686ee !important;
    color: #fff;
  }

  table tbody td span {
    font-size: 1rem;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="container-full">
    <!-- Main content -->
    <section class="content">


      <div class="box">
        <div class="box-header">
          <h5 class="box-title">Calendar</h5>
        </div>
        <div class="box-body">
          <div id="kalendar"></div>
        </div>
      </div>



    </section>
    <!-- /.content -->
  </div>
</div>

<script src="{{ asset('assets/fc/moment.min.js') }}"></script>
<script src="{{ asset('assets/fc/fullcalendar.min.js') }}"></script>

<!-- <script src="{{ asset('assets/fc/calendar.init.js') }}"></script> -->



<!-- <script src="{{ asset('assets/fullcalendar/tui-code-snippet.min.js') }}"></script>
<script src="{{ asset('assets/fullcalendar/tui-time-picker.min.js') }}"></script>
<script src="{{ asset('assets/fullcalendar/tui-date-picker.min.js') }}"></script>
<script src="{{ asset('assets/fullcalendar/moment.min.js') }}"></script>
<script src="{{ asset('assets/fullcalendar/chance.min.js') }}"></script>
<script src="{{ asset('assets/fullcalendar/tui-calendar.js') }}"></script>
<script src="{{ asset('assets/fullcalendar/calendars.js') }}"></script>
<script src="{{ asset('assets/fullcalendar/schedules.js') }}"></script>
<script src="{{ asset('assets/fullcalendar/app.js') }}"></script> -->

<script>
  var setDate = new Date(2022, 0, 3)
  console.log(setDate);

  ! function(l) {
    "use strict";
    var e = function() {
      this.$body = l("body"), this.$modal = l("#event-modal"), this.$event = "#external-events div.external-event", this.$calendar = l("#kalendar"), this.$saveCategoryBtn = l(".save-category"), this.$categoryForm = l("#add-category form"), this.$extEvents = l("#external-events"), this.$calendarObj = null
    };
    e.prototype.onDrop = function(e, n) {
      var t = e.data("eventObject"),
        a = e.attr("data-class"),
        o = l.extend({}, t);
      o.start = n, a && (o.className = [a]), this.$calendar.fullCalendar("renderEvent", o, !0), l("#drop-remove").is(":checked") && e.remove()
    }, e.prototype.onEventClick = function(n, e, t) {
        console.log(t)
        console.log(e)
        console.log(n)
        window.location.href = '<?=url('admin/view/lead-view')?>/' + n.id;
      var a = this,
        o = l("<form></form>");
      o.append("<label>Change event name</label>"), o.append("<div class='input-group'><input class='form-control' type=text value='" + n.title + "' /><span class='input-group-btn'><button type='submit' class='btn btn-success waves-effect waves-light'><i class='fa fa-check'></i> Save</button></span></div>"), a.$modal.modal({
        backdrop: "static"
      }), a.$modal.find(".delete-event").show().end().find(".save-event").hide().end().find(".modal-body").empty().prepend(o).end().find(".delete-event").unbind("click").click(function() {
        a.$calendarObj.fullCalendar("removeEvents", function(e) {
          return e._id == n._id
        }), a.$modal.modal("hide")
      }), a.$modal.find("form").on("submit", function() {
        return n.title = o.find("input[type=text]").val(), a.$calendarObj.fullCalendar("updateEvent", n), a.$modal.modal("hide"), !1
      })
    }, e.prototype.onSelect = function(t, a, e) {
      var o = this;
      o.$modal.modal({
        backdrop: "static"
      });
      var i = l("<form></form>");
      i.append("<div class='row'></div>"), i.find(".row").append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Insert Event Name' type='text' name='title'/></div></div>").append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div></div>").find("select[name='category']").append("<option value='bg-danger'>Danger</option>").append("<option value='bg-success'>Success</option>").append("<option value='bg-purple'>Purple</option>").append("<option value='bg-primary'>Primary</option>").append("<option value='bg-pink'>Pink</option>").append("<option value='bg-info'>Info</option>").append("<option value='bg-inverse'>Inverse</option>").append("<option value='bg-orange'>Orange</option>").append("<option value='bg-brown'>Brown</option>").append("<option value='bg-teal'>Teal</option>").append("<option value='bg-warning'>Warning</option></div></div>"), o.$modal.find(".delete-event").hide().end().find(".save-event").show().end().find(".modal-body").empty().prepend(i).end().find(".save-event").unbind("click").click(function() {
        i.submit()
      }), o.$modal.find("form").on("submit", function() {
        var e = i.find("input[name='title']").val(),
          n = (i.find("input[name='beginning']").val(), i.find("input[name='ending']").val(), i.find("select[name='category'] option:checked").val());
        return null !== e && 0 != e.length ? (o.$calendarObj.fullCalendar("renderEvent", {
          title: e,
          start: t,
          end: a,
          allDay: !1,
          className: n
        }, !0), o.$modal.modal("hide")) : alert("You have to give a title to your event"), !1
      }), o.$calendarObj.fullCalendar("unselect")
    }, e.prototype.enableDrag = function() {
      l(this.$event).each(function() {
        var e = {
          title: l.trim(l(this).text())
        };
        l(this).data("eventObject", e), l(this).draggable({
          zIndex: 999,
          revert: !0,
          revertDuration: 0
        })
      })
    }, e.prototype.init = function() {
      this.enableDrag();
      var e = new Date,
        n = (e.getDate(), e.getMonth(), e.getFullYear(), new Date(l.now()));
      let t = [
        <?php if (!empty($calendar_tasks)) {
          foreach ($calendar_tasks as $task) { ?> {
              id:"{{$task['lead_id']}}",
              title: "{{ $task['task'] }}",
              <?php $d = explode("-", $task["date"]);  ?>
              start: new Date(<?= intval($d[0]) ?>, <?= intval($d[1] - 1) ?>, <?= intval($d[2]) ?>),
              className: "bg-success"
            },
        <?php }
        } ?>
        <?php if (!empty($calendar_events)) {
          foreach ($calendar_events as $event) { ?> {
              id:"{{$event['lead_id']}}",
              title: "{{ $event['event'] }}",
              <?php $d = explode("-", $event["date"]);  ?>
              start: new Date(<?= intval($d[0]) ?>, <?= intval($d[1] - 1) ?>, <?= intval($d[2]) ?>),
              className: "bg-success"
            },
        <?php }
        } ?>
      ];
      let a = this;
      a.$calendarObj = a.$calendar.fullCalendar({
        slotDuration: "00:15:00",
        minTime: "08:00:00",
        maxTime: "19:00:00",
        defaultView: "month",
        handleWindowResize: !0,
        height: l(window).height() - 200,
        header: {
          left: "prev,next today",
          center: "title",
          right: "month,agendaWeek,agendaDay"
        },
        events: t,
        editable: !0,
        droppable: !0,
        eventLimit: !0,
        selectable: !0,
        drop: function(e) {
          a.onDrop(l(this), e)
        },
        select: function(e, n, t) {
          a.onSelect(e, n, t)
        },
        eventClick: function(e, n, t) {
          a.onEventClick(e, n, t)
        },
        dayClick: function(date, jsEvent, view) {
          if (moment().format('YYYY-MM-DD') < date.format('YYYY-MM-DD') || date.isAfter(moment())) {
            // This allows today and future date
          } else {

          }

        },
      }), this.$saveCategoryBtn.on("click", function() {
        var e = a.$categoryForm.find("input[name='category-name']").val(),
          n = a.$categoryForm.find("select[name='category-color']").val();
        null !== e && 0 != e.length && (a.$extEvents.append('<div class="external-event bg-' + n + '" data-class="bg-' + n + '" style="position: relative;"><i class="mdi mdi-checkbox-blank-circle m-r-10 vertical-middle"></i>' + e + "</div>"), a.enableDrag())
      })
    }, l.CalendarApp = new e, l.CalendarApp.Constructor = e
  }(window.jQuery),
  function(e) {
    "use strict";
    window.jQuery.CalendarApp.init()
  }();
</script>

@include('admin.footer')
