$(document).ready(function() {
    $(".loader").fadeOut("slow");
})

$(window).on('load', () => {
  let $transformHidden = $('.transformHidden')
  Array.from({ length: $transformHidden.length }).forEach((unit, i) => {
    setTimeout(function () {
      $(`.container>.row>.transformHidden:nth-child(${i + 1})`).removeClass('hiddenAnimal')
    }, i * 200)
  })
})


let animalObj = {
  changes: false
}

$('.animalForm').on('change', function (ev) {
  let $this = $(ev.target)
  if ($this[0].type == 'checkbox') {
    animalObj[$this[0].name] = $this.prop('checked')
    animalObj.changes = true
  } else {
    animalObj[$this[0].name] = $this.val()
    animalObj.changes = true
  }
})

$('.animalForm').on('click', '.fa.fa-pencil', function (ev) {
  let $this = $(ev.target)
  $this.prev().hide(() => {
    $this.parent().next().removeClass('hide')
  })
})
let $hiddenId = $('input[type="hidden"]').attr('data-id')

$('.edit-save').click(function (ev) {
  ev.preventDefault()
  if (animalObj.changes === true) {
    delete animalObj.changes
    $.ajax({
      method: 'POST',
      ContentType: 'application/json',
      url: editRoute,
      data: {body: animalObj, _token: token},
      success: function (data) {
        $('input[type="inbox"]').prop('checked')
        let $div = $('<div></div>')
        $div.attr('id', 'save-message')
        $div.addClass('alert alert-success')
        $div.html('Changes saved')
        $('.animalForm').prepend($div)
          (function () {
            setTimeout(function () {
              $('#save-message').hide('slow')
            }, 2000)
          } ())
      },
      error: function (err) {
        console.log(err)
      }
    })
  }
  $('.animalForm input, textarea').addClass('hide')
  $('input[type="checkbox"]').removeClass('hide')
  $('#span-name').text($('input[name="name"]').val())
  $('#span-years').text($('input[name="years"]').val())
  $('#span-months').text($('input[name="months"]').val())
  $('#span-desc').text($('textarea[name="description"]').val())
  $('.fa.fa-pencil').prev().show()
  ev.preventDefault()
})

/* deleting one of the added images */
$('.image-delete-button').click(function(ev) {
  $this = $(ev.target)
  if (!confirm('are you sure you want to delete?')) {
    ev.preventDefault()
  }
  let imageId = $this.parent().attr('data-image-id')
  $.ajax({
    method: 'POST',
    ContentType: 'application/json',
    url: deleteRoute,
    data: {body: imageId, _token: token},
    success: function(msg) {
      $this.parent().remove()
    }
  })
})

/* setting one of the added images as the default image */

$('.image-default-button').click(function(ev) {
  $this = $(ev.target)
  let imageId = $this.parent().attr('data-image-id')
  $.ajax({
    method: 'POST',
    ContentType: 'application/json',
    url: defaultRoute,
    data: { body: imageId, _token: token},
    success: function(msg) {
      let animalImage = $('.animal-image').attr('src')
      $('.animal-image').attr('src', $this.parent().find('img').attr('src'))
      $this.parent().find('img').attr('src', animalImage)
    }
  })
})

$('.confirm-alert').click((ev) => {
  if (!confirm('Are you sure you want to delete?')) {
    ev.preventDefault();
  }
})