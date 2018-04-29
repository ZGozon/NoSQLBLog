function togglePostForm(div) {
  if (div === 'text-post') {
    document.getElementById('text-post').style.display = "block";
    document.getElementById('img-post').style.display = "none";
    document.getElementById('link-post').style.display = "none";
  } else if (div === 'img-post') {
    document.getElementById('img-post').style.display = "block";
    document.getElementById('text-post').style.display = "none";
    document.getElementById('link-post').style.display = "none";
  } else {
    document.getElementById('link-post').style.display = "block";
    document.getElementById('text-post').style.display = "none";
    document.getElementById('img-post').style.display = "none";
  }
}

function closePost() {
  document.getElementById('text-post').style.display = "none";
  document.getElementById('img-post').style.display = "none";
  document.getElementById('link-post').style.display = "none";
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})