#!/bin/bash

EDITLINE=`grep -n '.*<li class="nav-header">.*Lists \& subscribers.*</li>.*' ../sidebar.php | cut -f1 -d:`
EDITLINE=$(($EDITLINE - 2))r
sed -i "$EDITLINE sidebar-addition-1.html" ../sidebar.php

EDITLINE=`grep -n '.*<li class="nav-header">.*Lists \& subscribers.*</li>.*' ../sidebar.php | cut -f1 -d:`
EDITLINE=$(($EDITLINE + 2))r
sed -i "$EDITLINE sidebar-addition-2.html" ../sidebar.php
echo 'sidebar.php modified...'

EDITLINE=`grep -n '.*<input.*type="text".*id="cost_per_recipient".*' ../../edit-brand.php | cut -f1 -d:`
EDITLINE=$(($EDITLINE + 4))r
sed -i "$EDITLINE edit-brand-addition.html" ../../edit-brand.php
echo 'edit-brand.php modified...'

EDITLINE=`grep -n '.*<input.*type="text".*id="cost_per_recipient".*' ../../new-brand.php | cut -f1 -d:`
EDITLINE=$(($EDITLINE + 4))r
sed -i "$EDITLINE new-brand-addition.html" ../../new-brand.php
echo 'new-brand.php modified...'

echo 'List management disable is now ready to use per-brand. Enjoy!'