(function($) {

    var app = {
        lookup: {
            OpenLibrary: function(ISBN, callback) {
                $.ajax({
                    url: "//openlibrary.org/api/books?bibkeys=ISBN:" + ISBN + "&jscmd=details&format=jsonp",
                    dataType: 'jsonp',
                    success: function(data) {
                        var rootKey = 'ISBN:' + ISBN;
                        if (typeof data[rootKey] != 'object') {
                            alert("Sorry, the ISBN you are looking for wasn't found in the OpenLibrary.org database.");
                            return;
                        }

                        app.ui.getLookupButton().addClass('ss-ui-action-constructive');
                        callback(data[rootKey]);

                    },
                    error: function() {
                        alert("Could not connect to the OpenLibrary.org database.");
                    }
                });
            },
            perform: function() {
                var ISBN13 = app.ui.getLookupButton().siblings('input').val().replace(/[^\d]+/, '');
                if (ISBN13.length != 13) {
                    alert("The ISBN you provided it's not a valid code.");
                    return;
                }

                app.lookup.OpenLibrary(ISBN13, app.ui.loadData);
            }
        },
        ui: {
            getLookupButton: function() {
                return $('#btnSearchISBN');
            },
            elementByTarget: function(targetText) {
                return $('input.target-' + targetText + ', textarea.textarea-' + targetText);
            },
            loadData: function(data) {
                app.ui.elementByTarget('name').val(data.details.title);
                app.ui.elementByTarget('info-url').val(data.info_url.replace(/^http(.*):\/\//, '//'));
                app.ui.elementByTarget('image-url').val(data.thumbnail_url.replace('-S.', '-M.').replace(/^http(.*):\/\//, '//'));

                var authors = '';
                $.each(data.details.authors, function(k, author) {
                    authors = authors.length ? authors + ', ' : authors;
                    authors += author.name;
                });
                app.ui.elementByTarget('authors').val(authors);
            }
        }
    };



    $.entwine('ss', function($) {
        window.app = app;

        app.ui.getLookupButton().entwine({
            onclick: function(e) {
                app.lookup.perform();
            }
        });

    });

})(jQuery)