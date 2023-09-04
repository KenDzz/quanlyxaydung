'use strict';

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var fullcalender = function () {
  /**
   * ------------------------------------------------------------------------
   * Class Definition
   * ------------------------------------------------------------------------
   */

  var fullcalender = function fullcalender() {
    _classCallCheck(this, fullcalender);
  };

  return fullcalender;
}();

window.Elk = new fullcalender();


fullcalender.prototype.FullCalendar = function () {

  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();

  var hdr = {};

  function createEvent() {
    $("#eventModal").modal('hide');

    $("#calendar").fullCalendar('renderEvent', {
      title: $('#title').val(),
      start: $('#start').val(),
      end: $('#end').val(),
      allDay: $('#allDay').prop('checked')
    }, true);
  }

  $('#newEventBtn').on('click', function () {
    $('#title').val('');
    $('#start').val('');
    $('#end').val('');
    $('#allDay').prop('checked', false);

    $('#eventModalLabel').html('Create New Event');

    $('#updateEventBtn').addClass('hidden');
    $('#deleteEventBtn').addClass('hidden');
    $('#createEventBtn').removeClass('hidden');

    // $("#eventModal").modal('show');
  });

  $('#createEventBtn').on('click', function (e) {
    // We don't want this to act as a link so cancel the link action
    e.preventDefault();
    createEvent();
  });

  function updateEvent(event) {

    event.title = $('#title').val();
    event.start = $('#start').val();
    event.end = $('#end').val();
    event.allDay = $('#allDay').prop('checked');
    return event;
  }

  if ($(window).width() <= 767) {
    hdr = {
      left: 'title',
      center: 'month,agendaWeek,agendaDay',
      right: 'prev,today,next'
    };
  } else {
    hdr = {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    };
  }

  $('#external-events .fc-event').each(function () {

    // store data so the calendar knows to render an event upon drop
    $(this).data('event', {
      title: $.trim($(this).text()), // use the element's text as the event title
      className: $.trim($(this).removeClass('external-event').attr('class')), // use the element's children as the event class
      stick: true // maintain when user navigates (see docs on the renderEvent method)
    });

    // make the event draggable using jQuery UI
    $(this).draggable({
      zIndex: 999,
      revert: true, // will cause the event to go back to its
      revertDuration: 0 //  original position after the drag
    });
  });

  var calendar = $('#calendar').fullCalendar({
    locale: 'vi',
    eventClick: function eventClick(calEvent, jsEvent, view) {
      var end = calEvent.end !== null ? moment(calEvent.end).format() : '';
      $('#title').val(calEvent.title);
      $('#start').val(calEvent.start);
      $('#end').val(end);
      $('#allDay').prop('checked', calEvent.allDay);

      $('#eventModalLabel').html('Update Or Delete Event');

      $('#updateEventBtn').removeClass('hidden');
      $('#deleteEventBtn').removeClass('hidden');
      $('#createEventBtn').addClass('hidden');

      $("#eventModal").modal('show');

      $('#updateEventBtn').on('click', function (e) {
        // We don't want this to act as a link so cancel the link action
        //e.preventDefault();
        $("#calendar").fullCalendar('updateEvent', updateEvent(calEvent));
      });
      $('#deleteEventBtn').on('click', function () {
        $("#calendar").fullCalendar('removeEvents', calEvent._id);

        $("#eventModal").modal('hide');
      });
    },
    header: hdr,
    selectable: true,
    selectHelper: true,
    select: function select() {
      $('#newEventBtn').click();
    },
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    droppable: true, // this allows things to be dropped onto the calendar
    drop: function drop() {
      // is the "remove after drop" checkbox checked?
      if ($('#drop-remove').prop('checked')) {
        // if so, remove the element from the "Draggable Events" list
        $(this).remove();
      }
    },
    events: []
  });

  function getData() {
    $.ajax({
        url: "/datacalendar",
        method: "post",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            Notiflix.Block.standard(".box-calendar");
        },
        complete: function () {
            Notiflix.Block.remove(".box-calendar");
        },
    })
    .done(function (data) {
        calendar.fullCalendar('removeEvents');
        calendar.fullCalendar('addEventSource', data);
    })
    .fail(function (jqXHR, ajaxOptions, thrownError) {
    });
}
getData();

};



/**
* ------------------------------------------------------------------------
* Flatpickr
* ------------------------------------------------------------------------
*/
'use strict';
var Pluggin = {
  flatpickr: function flatpickr(element) {
    if (window.Flatpickr !== undefined) {
      $(element).flatpickr();
    } else {
      throw new Error('First install flatpickr plugin! https://chmln.github.io/flatpickr/');
    }
  }

};

$(document).on("chl.plugin", function () {
  $("[data-plugin]").each(function () {
    Pluggin[$(this).attr("data-plugin")](this);
  });
}).trigger("chl.plugin");
