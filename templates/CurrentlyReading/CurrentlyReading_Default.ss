<h5><%t CurrentlyReading.Title 'Currently Reading:' %></h5>
<% loop Books %>

<% if not $First %><hr><% end_if %>

<div class="currently-reading-item">
    <a href="{$InfoURL}" title="{$Name}" rel="nofollow" target="_blank" class="currently-reading-title">{$Name}</a>

    <div class="currently-reading-image">
        <img src="{$ImageURL}" alt="{$Name}">
    </div>

    <em class="currently-reading-authors">{$Authors}</em>
</div>
<% end_loop %>