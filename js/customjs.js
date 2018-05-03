function togglePostForm(div) {
  if (div === 'text-post') {
    document.getElementById('text-post').style.display = "block";
    document.getElementById('img-post').style.display = "none";
    document.getElementById('link-post').style.display = "none";
    let x = document.getElementsByClassName('post-form');
    x[0].reset();
  } else if (div === 'img-post') {
    document.getElementById('img-post').style.display = "block";
    document.getElementById('text-post').style.display = "none";
    document.getElementById('link-post').style.display = "none";
    let x = document.getElementsByClassName('post-form');
    x[1].reset();
  } else {
    document.getElementById('link-post').style.display = "block";
    document.getElementById('text-post').style.display = "none";
    document.getElementById('img-post').style.display = "none";
    let x = document.getElementsByClassName('post-form');
    x[2].reset();
  }
}

function closePost() {
  document.getElementById('text-post').style.display = "none";
  document.getElementById('img-post').style.display = "none";
  document.getElementById('link-post').style.display = "none";
  let x = document.getElementsByClassName('post-form');
  x[0].reset();
  x[1].reset();
  x[2].reset();
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});