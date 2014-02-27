webtypography
=============

This is the source code for WebTypography.net, a practical guide to web typography which translates some aspects of The Elements of Typographic Style by Robert Bringhurst.

The site was initially [launched](http://clagnut.com/blog/1600/) in December 2005 by [Richard Rutter](http://clagnut.com/).

The markup still holds up but you might consider the CSS to be a bit... 2005. The site was built using a fluid layout so while it's not fully responsive (at the time of writing) it is pretty flexible.

## Adding new items

The site builds upon the individual guidelines written in Bringhurst's book. To add a new guideline, you should add an entry in the PHP array in `/includes/data.inc.php` and then create an HTML file with the main content in the `/items` folder.
