#!/usr/bin/env_perl

use strict;
use WWW::Mechanize;

chdir "/srv/www/pictureshow/";

my $url = "https://www.dropbox.com/sh/1pkoh4o9dc17w5d/AACS_rTPwuiKctCJ9jZ_REkba?dl=1";

my $local_file = "images.zip";

my $mech = WWW::Mechanize->new;

$mech->get( $url, ":content_file" => $local_file );

chdir "/srv/www/pictureshow/images";
system("rm -rf ./*");

=pod
    Replace the next few lines with perl code to unzip file,
    save a list of the images
=cut

my $unzipCommand = "unzip ../images.zip";
system($unzipCommand);

my $imgListCommand = "ls > ../imglist.txt";

system($imgListCommand);
