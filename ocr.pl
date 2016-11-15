#!/usr/bin/perl

$host = $ARGV[0];
$db = $ARGV[1];
$usr = $ARGV[2];
$pwd = $ARGV[3];

print "Text Insertion\n";

use DBI();

my $dbh=DBI->connect("DBI:mysql:database=$db;host=$host","$usr","$pwd");
$sth_enc=$dbh->prepare("set names utf8");
$sth_enc->execute();
$sth_enc->finish();

$sth11=$dbh->prepare("drop table if exists searchtable");
$sth11->execute();
$sth11->finish(); 

$sth11=$dbh->prepare("CREATE TABLE searchtable(kanda varchar(20),
sarga varchar(10),
text varchar(5000)) ENGINE=MyISAM character set utf8 collate utf8_general_ci");
$sth11->execute();
$sth11->finish(); 
@kanda = `ls Text`;

for($i1=0;$i1<@kanda;$i1++)
{
	print $kanda[$i1];
	chop($kanda[$i1]);
	@files = `ls Text/$kanda[$i1]/`;

	for($i3=0;$i3<@files;$i3++)
	{
		chop($files[$i3]);
		if($files[$i3] =~ /\.txt/)
		{
			$kan = $kanda[$i1];
			$sarga = $files[$i3];
			open(DATA,"<:utf8","Text/$kan/$sarga")or die ("cannot open Text/$kan/$sarga");
			
			local $/;
			$content = <DATA>;
			$sarga =~ s/\.txt//g;
			
			$line=<DATA>;
			$content =~ s/\\/\//g;
			$content =~ s/'/\\'/g;
			$content =~ s/\"/\\"/g;
			$content =~ s/\n/ /g;
			$content =~ s///g;
			$content =~ s///g;
			$content =~ s///g;
			$content =~ s/^\s+|\s+$//g;
			$sth1=$dbh->prepare("insert into searchtable values ('$kan','$sarga','$content')");
			$sth1->execute()  or die("kanda $kan Page $sarga");
			$sth1->finish();
			close(DATA);
		}
	}
}

