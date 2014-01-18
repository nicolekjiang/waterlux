var tumblr = require('lib/tumblr.js');
var client = tumblr.createClient({
  consumer_key: 'opMsYtczy1tQ8GHEALp7a47dDArQOdgr3Dm8mjfM3sKXJWt2XI',
  consumer_secret: '7SYKI5VKzyjTsGfdXCyZFDuxXcnJGTm1noYZ3WkRY99Sn3skTv',
  token: 'RCrAAWnFXTxryacILTE3Vf0JIPwLit0srcj2JZBZm4ALAODqXL',
  token_secret: 'D9VcrokjdB3SjKcRDMqX1D3kF0kkCQgJx9yFprQ4HhC0soDEOr'
});

client.userInfo(function (err, data) {
    data.blogs.forEach(function (blog) {
        console.log(blog.name);
    });
});

client.text('bywaterlux', { title: 'This is a test',
                                body: 'This is a test of the tumblr javascript API',
                                tweet: 'off',
                                format: 'markdown',
                                tags: 'comma, separated, list, of, tags'}, function (err, success) {
    console.log(success);
});