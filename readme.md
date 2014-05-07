## Silverstripe 3.1 "Currently Reading" module ##

This is a basic module used to display one or multiple books in the front-end of a website, as 'currently reading'.

#### Displayed information ####
- Title (with link)
- Cover
- Auhor(s)

[Front-end view example](http://savedonthe.net/image/2025/SilverstripeCurrentlyReading1.jpg)


The admin panel features a lookup buton which can be used to auto-fill all the fields using only the ISBN-13 code. The lookup is performed over the following API's:
- OpenLibrary.org
- ~~Google Books~~ (todo)

The admin panel also offers the option to insert multiple books and assign various statuses: __Planned__, __Reading__ and __Finished__. In the front-end, all the books having the status __Reading__ will be shown.
