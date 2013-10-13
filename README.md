NL-municipal-map-gen
====================

A generator that colors the individual municipalities of the Netherlands based on their status in a SQL table.

<h3>How to use</h3>
* Import [SQL data](https://github.com/VDK/NL-municipal-map-gen/blob/master/data.sql) onto your database.
* Change [database settings in index.php](https://github.com/VDK/NL-municipal-map-gen/blob/master/index.php#L16).
* Upload [index.php](https://github.com/VDK/NL-municipal-map-gen/blob/master/index.php) and [map.xml](https://github.com/VDK/NL-municipal-map-gen/blob/master/map.xml) to your server.
* Specify the colors you'd like to use in the database in the table *&#95;status&#95;to&#95;color*, specify a municipal status in *&#95;progress*, there is no GUI for this.


<h3>Also...</h3> 

* [Embed-shapefile-data-into-SVG.php](https://github.com/VDK/NL-municipal-map-gen/blob/master/Embed-shapefile-data-into-SVG.php) is the script that I used to embed additional info into the SVG after it had been exported. It is not essential for the generators functioning.
* The table *&#95;cbs&#95;changes* is there to keep the map functioning after municipalities have merged at the beginning of each year. By this table it has joined the municipalities that merged at the beginning of 2013. It should be kept up to date using [this CBS data](http://www.cbs.nl/nl-NL/menu/methoden/classificaties/overzicht/gemeentelijke-indeling/2013/default.htm).

<h3>Map data</h3>

The map was generated out of the shapefile of the [*Wijken- en buurtenkaart 2012*](http://www.cbs.nl/nl-NL/menu/themas/dossiers/nederland-regionaal/publicaties/geografische-data/archief/2013/2013-2012-b68-pub.htm), which was published under the condition of attributing the map to the Centraal Bureau voor de Statistiek and Het Kadaster.

*Publicatie van digitale geometrie is toegestaan mits het CBS en het Kadaster als bronnen worden vermeld.*
