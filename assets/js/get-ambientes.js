$(document).ready(function() {

  var projects = $('.card');
  var filteredProjects = [];
  var selection = "all";
  var running = false;

  window.setTimeout(function() {
    $('.all').trigger('click');
  }, 150);

  $(window).resize(function() {
    buildGrid(filteredProjects);
  });

  function select_ambients(e) {

    if(e){
      e.preventDefault();
    }

    if (!running) {

      running = true;

      let disp = $(window).width();

     if(disp <= 1200){

       selection = $('.select-cat').val();

      }else{
        selection = $(this).data('group');
        $('.category-buttons a').removeClass('active');
        $(this).addClass('active');
      }

      filteredProjects = [];

      for (i = 0; i < projects.length; i++) {

        var project = projects[i];
        var dataString = $(project).data('groups');
        var dataArray = dataString.split(',');

        // dataArray.pop();

        if (selection === 'all') {

          $(project).addClass('setScale').queue(function(next) {

            filteredProjects.push(project);
            next();

          }).queue(function(next) {

            $(this).removeClass('setScale');
            next();

          }).queue(function(next) {

            $(this).addClass('animating show')
            next();

          }).delay(750).queue(function() {

            running = false;
            $(this).removeClass('animating').dequeue();

          });

        } else {

          if ($.inArray(selection, dataArray) > -1) {

            $(project).addClass('setScale').queue(function(next) {

              filteredProjects.push(project);
              next();

            }).queue(function(next) {

              $(this).removeClass('setScale');
              next();

            }).queue(function(next) {

              $(this).addClass('animating show')
              next();

            }).delay(750).queue(function() {

              running = false;
              $(this).removeClass('animating').dequeue();

            });

          } else {

            $(project).queue(function(next) {

              $(this).addClass('animating');
              next();

            }).queue(function(next) {

              $(this).removeClass('show');
              next();

            }).delay(750).queue(function() {

              $(this).removeClass('animating').dequeue();

            });
          }
        }
      }
      buildGrid(filteredProjects);
    }
  }

  $('.category-buttons a').on('click', e => select_ambients.call(e.target));
  $('.select-cat').change(e => select_ambients(e));

  function buildGrid(projects) {

    let left = 0,
        top = 0,
        totalHeight = 0,
        largest = 0,
        heights = [];

    for (i = 0; i < projects.length; i++) {

      $(projects[i]).css({ 'height' : 'auto' });
      heights.push($(projects[i]).height());

    }

    var maxIndex = 0,
        maxHeight = 0;

    for (i = 0; i <= heights.length; i++) {

      if (heights[i] > maxHeight) {

        maxHeight = heights[i];
        maxIndex = i;
        $('.guide').height(maxHeight);

      }

      if (i === heights.length) {

        for (i = 0; i < projects.length; i++) {

          $(projects[i]).css({ 'position' : 'absolute', 'left' : left + '%', 'top' : top });

          left = left + ($('.guide').width() / $('#grid').width() * 100) + 2;

          if (i === maxIndex) {

            $(projects[i]).css({ 'height' : 'auto' });

          } else {

            $(projects[i]).css({ 'height' : maxHeight });
          }

          if ((i + 1) % 3 === 0 && projects.length > 3 && $(window).width() >= 768) {

            top = top + $('.guide').height() + 20;
            left = 0;
            if((i + 1) === projects.length) return;
            totalHeight = totalHeight + $('.guide').height() + 20;

          } else if ((i + 1) % 2 === 0 && projects.length > 2 && $(window).width() < 768 && $(window).width() >= 480) {

            top = top + $('.guide').height() + 20;
            left = 0;
            if((i + 1) === projects.length) return;
            totalHeight = totalHeight + $('.guide').height() + 20;

          } else if ((i + 1) % 1 === 0 && projects.length > 1 && $(window).width() < 480) {

            top = top + $('.guide').height() + 20;
            left = 0;
            if((i + 1) === projects.length) return;
            totalHeight = totalHeight + $('.guide').height() + 20;

          }
          $('#grid').height(totalHeight + $('.guide').height());
        }
      }
    }
  }
});
