#########################################################################
# File Name: gallery.sh
# Author: chenzihao
# Created Time: 2020年06月30日 星期二 18时26分50秒
#########################################################################
#!/bin/bash
if [ -z $1 ]
then
    output='gallery.html'
else
    output=$1
fi
if [ -e $output ]
then
    echo '' > $output
else
    touch $output
fi
if [ ! -e thumbs ]
then
    mkdir thumbs
fi
echo '<!DOCTYPE html>
<html>
    <head>
    <title>rsync_百度搜索</title>
    </head>
    <body>' >> $output
for i in `ls *.png 2>/dev/null`
do
    convert $i -thumbnail '200x200>' thumbs/$i
    echo ' <a href="'$i'"><img src="thumbs/'$i'" /></a>"' >> $output
done
echo ' </body>
</html>' >> $output
