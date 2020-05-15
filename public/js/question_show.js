/**
 * Simply needed code. In future will be refactored.
 */

var $container = $('.js-vote-arrows');
$container.find('a').on('click', function (e) {
    e.preventDefault();
    var $link = $(e.currentTarget);

    let currentLocation = location.href;
    let end_text = 'public';
    let absolute_root_path = currentLocation.substring(0, currentLocation.indexOf(end_text) + end_text.length);


    $.ajax({
        url: absolute_root_path + '/comments/10/vote/' + $link.data('direction'),
        method: 'POST'
    }).then(function (data) {
        $container.find('.js-vote-total').text(data.votes);
    });
});