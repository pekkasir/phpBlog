$(document).ready(function() {

});



function deletePost(id) {
  if(confirm("Do you really want to delete post with " + id +" ?")) {
    $.ajax({
      url: 'delete.php',
      method: 'POST',
      data: {id: id},
      success: function(data) {
        $('.info').html(data);
      }
    });
    setTimeout(location.reload.bind(location), 2000);
  } else {
    return false;
  }
}

function updateTitle(target, id) {
  var data = target.textContent;
  $.ajax({
    url: 'update.php',
    method: 'POST',
    data: {title: data, id: id},
    success: function(data) {
      $('.info').html(data);
    }
  });
}

function updateAuthor(target, id) {
  var data = target.textContent;
  $.ajax({
    url: 'update.php',
    method: 'POST',
    data: {author: data, id: id},
    success: function(data) {
      $('.info').html(data);
    }
  });
}

function updateBody(target, id) {
  var data = target.textContent;
  $.ajax({
    url: 'update.php',
    method: 'POST',
    data: {body: data, id: id},
    success: function(data) {
      $('.info').html(data);
    }
  });
}
