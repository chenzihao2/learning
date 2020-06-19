<?php
/*************************************************************************
    > File Name: order_for_log.php
    > Author: chenzihao
    > Created Time: 二  7/31 20:22:10 2018
 ************************************************************************/
grep CheckInfoAlgo curl_info.log | grep --col -o 'spend":\w*.\w*' | awk -F':' '{print $2}' | awk '{sum+=$1} END {print "Average = ", sum/NR}'

grep CheckInfoAlgo curl_info.log | grep --col -o 'spend":\w*.\w*' | awk -F':' '{print $2}' | sort | uniq -c | sort -k1nr | head
