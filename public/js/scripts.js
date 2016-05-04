var topics = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  remote: {
    url: '/search_topics.php?query=%QUERY',
    wildcard: '%QUERY'
  }
});

function searchTopics(query, cb)
{
  var parameters = {
    query: query
  };
  $.getJSON("search_topics.php", parameters)
  .done(function(data, textStatus, jqXHR) {
    console.log(data);
    return cb(data);
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
    console.log(errorThrown.toString());
  });
}

$(function() {

  $('#search-topics').typeahead({
    autoselect: true,
    highlight: true,
    minLength: 1
  },
  {
    source: searchTopics
  });
});
