document.addEventListener('DOMContentLoaded', function() {
  var likeButton = document.getElementById('likeButton');
  var likeCount = document.getElementById('likeCount');
  var videoId = likeButton.getAttribute('data-video-id');

  likeButton.addEventListener('click', function() {
    likeVideo(videoId);
  });

  function likeVideo(videoId) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/like', true);
    xhr.setRequestHeader('Content-type', 'application/json');

    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        likeCount.textContent = response.likes;
      }
    };

    xhr.send(JSON.stringify({ videoId: videoId }));
  }
});
