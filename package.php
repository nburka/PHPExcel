<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * This is the package.xml generator for PHPExcel
 *
 * PHP version 5
 *
 * LICENSE: GNU LESSER GENERAL PUBLIC LICENSE (LGPL)
 *
 * @package   PHPExcel
 * @copyright Copyright (c) 2006 - 2013 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license   http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt LGPL 
 */

require_once 'PEAR/PackageFileManager2.php';
PEAR::setErrorHandling(PEAR_ERROR_DIE);

$apiVersion     = '1.0.0';
$apiState       = 'beta';

$releaseVersion = '1.0.0';
$releaseState   = 'beta';

$package = new PEAR_PackageFileManager2();

$package->setOptions(
    array(
        'filelistgenerator' => 'file',
        'simpleoutput'      => true,
        'baseinstalldir'    => '/PHPExcel',
        'packagedirectory'  => './',
        'dir_roles'         => array(
            'Classes'    => 'php'
        ),
        'exceptions'        => array(
            'LICENSE.txt'   => 'doc',
            'changelog.txt' => 'doc',
            'install.txt'   => 'doc',
            'README.md'     => 'doc'
        ),
        'ignore'            => array(
            'composer.json',
            'package.php',
            '*.tgz'
        )
    )
);

$package->setPackage('PHPExcel');
$package->setSummary('Read, Write and Create spreadsheet documents in PHP');
$package->setDescription('PHPExcel is a library written in pure PHP and '.
    'providing a set of classes that allow you to write to and read from '.
    'different spreadsheet file formats, like Excel (BIFF) .xls, Excel '.
    '2007 (OfficeOpenXML) .xlsx, CSV, Libre/OpenOffice Calc .ods, Gnumeric, '.
    'PDF, HTML, ... This project is built around Microsoft\'s OpenXML '.
    'standard and PHP.');

$package->setChannel('pear.silverorange.com');
$package->setPackageType('php');
$package->setLicense('LGPL',
    'http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt');

$package->setNotes('First release!');

$package->setReleaseVersion($releaseVersion);
$package->setReleaseStability($releaseState);
$package->setAPIVersion($apiVersion);
$package->setAPIStability($apiState);

$package->addMaintainer(
    'lead',
    'nick',
    'Nick Burka',
    'nick@silverorange.com'
);

$package->addMaintainer(
    'lead',
    'nrf',
    'Nathan Fredrickson',
    'nathan@silverorange.com'
);

$package->setPhpDep('5.2.0');
/*
$package->addExtensionDep('required', 'php_zip');
$package->addExtensionDep('required', 'php_xml');
$package->addExtensionDep('required', 'php_gd2');
*/
$package->setPearinstallerDep('1.4.0');

$package->generateContents();

if (   isset($_GET['make'])
    || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')
) {
    $package->writePackageFile();
} else {
    $package->debugPackageFile();
}

?>
