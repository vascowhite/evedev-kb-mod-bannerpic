# BannerPic by vasco di For EDK 3 #

This mod will allow you to generate a banner picture containing the latest kill by your corp or your alliance (it will also work on single pilot boards).
It can, optionally, replace the banner at the top of your killboard with something like this:-

![http://www.vascowhite.co.uk/banner.jpg](http://www.vascowhite.co.uk/banner.jpg)

You can use it as a banner for your forums to give something like this:-

![http://www.vascowhite.co.uk/asec.jpg](http://www.vascowhite.co.uk/asec.jpg)

You'll have to do your own art work though :)

## Installation ##

Download the archive from [here](http://code.google.com/p/evedev-kb-mod-bannerpic/).

Alternatively you can check it out from the [SVN repository](http://evedev-kb-mod-bannerpic.googlecode.com/svn/trunk/).

Inside the archive is a folder called bannerPic which should be copied into the mods directory of your killboard, so that you end up with a mods/bannerPic folder.

Go to the admin/modules page of your killboard and enable the mod.
Refresh the admin page and you will see a menu item 'bannerPic' at the bottom of the admin menu on the right. Click on this and you will see the options page.

## Settings ##
Hopefully most are self explanatory, but here is a brief description in the order they appear on the page, top to bottom.

  * Use as killboard banner?
> > When Checked this will replace the default killboard banner with bannerPic banner.
> > If you change your mind and un-check it you will need to re-select the banner you want in Global Options.
  * Base picture to use as banner
> > This is the blank template picture that the kill information will be merged with. At the moment only jpeg images are supported, but this may change in a future release. You can use any picture you want here, but it is probably easiest to just replace the base.jpg in the mods/bannerPic folder.
  * Victim Portrait : Victim Ship Picture
    * Left Edge
> > > the distance in pixels between the left edge of the kill detail picture and the left edge of the base picture.
    * Top Edge
> > > the distance in pixels between the top edge of the kill detail picture and the top edge of the base picture.
    * Transparency (Should read 'opacity', but I haven't changed it yet!).
> > > If this is less than 100 then the portrait and ship image will be proportionately transparent.
  * Killer Text Position : Victims Corporation Position : Victims Alliance Position : Victims Ship Position

> > These three sections control the positions of the various lines of text as follows:-
    * Left Edge
> > > As for picture Left Edge
    * Top Edge
> > > As for picture Top Edge
    * Colours
> > > The RGB settings for the border around the portraits and the text colour
    * Font

> > Specify a file for the font (ttf) and the size used, default is 12px.
  * Preview
> > This enables you to see what your picture will look like after each change of settings. In order for it to update properly check the disable cache box.

## Use ##
To use this as a forum banner (or anywhere else) then just set the url of the image to http://urltoyourkb/?a=bannerPic.
Something like this would work:-

`<img src="http://urltoyourkb/?a=bannerPic" alt="look who we just killed!" />`

As you can see, it can go anywhere you would place an image.


Feel free to use or modify this as you want, but it comes with no warranty and you install it at your own risk.

For support, bug reports or suggestions raise an issue [here](http://code.google.com/p/evedev-kb-mod-bannerpic/issues/list).

Enjoy :)