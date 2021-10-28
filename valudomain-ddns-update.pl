#!/usr/bin/perl

#
# VALUE DOMAIN用DDNS IPアドレス更新スクリプト
#

# 登録情報
$DOMAIN          = "$ARGV[0]";
$PASSWORD        = "$ARGV[1]";

# IPアドレス更新ログファイル
$LOG_FILE        = "/var/log/valudomain/ip_update.log";

# 現在IPアドレス保存ファイル
if ($#ARGV eq 2) {
    $CURRENT_IP_FILE = "/var/log/valudomain/$ARGV[2].$DOMAIN";
} else {
    $CURRENT_IP_FILE = "/var/log/valudomain/$DOMAIN";
}

# IPアドレス検出CGI
$REMOTE_ADDR_CHK = "http://dyn.value-domain.com/cgi-bin/dyn.fcg?ip";

# DDNS更新CGI
$DDNS_UPDATE     = "http://dyn.value-domain.com/cgi-bin/dyn.fcg";

if(!open(FILE,"$CURRENT_IP_FILE")) {
    $CURRENT_IP = '0.0.0.0';
} else {
    $CURRENT_IP = <FILE>;
    close FILE;
}

$NEW_IP = '0.0.0.0';
$NEW_IP = `wget -q -O - $REMOTE_ADDR_CHK`;

if ($NEW_IP ne "0.0.0.0" and $CURRENT_IP ne $NEW_IP) {

    if ($#ARGV eq 2) {
        $STATUS = `wget -q -O - '$DDNS_UPDATE?d=$DOMAIN&p=$PASSWORD&h=$ARGV[2]&i=$NEW_IP'`;
        $FQDN = "$ARGV[2].$DOMAIN";
    } else {
        $STATUS = `wget -q -O - '$DDNS_UPDATE?d=$DOMAIN&p=$PASSWORD&i=$NEW_IP'`;
        $FQDN = "$DOMAIN";
    }

    if ($STATUS =~ m/status=0/) {    
        open (FILE ,">$CURRENT_IP_FILE");
        print FILE $NEW_IP;
        close FILE;
        $TIME = localtime;
        open (FILE ,">>$LOG_FILE");
        print FILE "$TIME $FQDN Updated $CURRENT_IP to $NEW_IP\n";
        close FILE;
    } else {
        $TIME = localtime;
        open (FILE ,">>$LOG_FILE");
        print FILE "$TIME $FQDN Update aborted $CURRENT_IP to $NEW_IP\n";
        print FILE "$STATUS\n";
        close FILE;
    }
}
exit;

