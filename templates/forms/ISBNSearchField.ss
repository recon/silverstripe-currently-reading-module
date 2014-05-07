<div>
    <input $AttributesHTML />

    <button class="btnFieldAction" id="btnSearchISBN" data-icon="magnifier">
        <% _t('CurrentlyReading.LookupISBN', 'Lookup ISBN') %>
    </button>

    <% if $HelpText %>
        <p class="help">$HelpText</p>
    <% end_if %>
</div>