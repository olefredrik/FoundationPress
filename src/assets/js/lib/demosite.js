import $ from 'jquery';

$.ajax({
  dataType: 'jsonp',
  url: 'https://api.github.com/repos/olefredrik/foundationpress?callback=foundationpressGithub&access_token=ed6229228dbc763038dbf1e68d0d8a4a0935b38a',
  success: function (response) {
    if (response && response.data.watchers) {
      var watchers = (Math.round((response.data.watchers / 100), 10) / 10).toFixed(1);
      $('#stargazers a').html(watchers + 'k stargazers');
    }
  }
});
