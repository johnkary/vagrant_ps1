<?php
/**
 * Checks current directory for a running Vagrant virtual machine
 *
 * Author: John Kary <john@johnkary.net>
 */
$cwd = getcwd();
$filecontents = getVagrantFileRunningInDir($cwd);

if (false === $filecontents) {
    // No vagrant file in this dir
    exit(1);
}

$uuid = getDirVagrantUuid($filecontents);
$runningVms = getRunningVms();

if (!isVmRunning($runningVms, $uuid)) {
    // VM not running
    exit(1);
}

// VM running
exit(0);


function getVagrantFileRunningInDir($dir)
{
    $path = realpath($dir . '/.vagrant');

    if (false === $path) {
        // File with UUID doesn't exist
        return false;
    }

    return file_get_contents($path);
}
function getDirVagrantUuid($filecontents)
{
    $vagrantJson = json_decode($filecontents);

    return $vagrantJson->active->default;
}
function getRunningVms()
{
    exec('vboxmanage list runningvms', $output);

    return $output;
}
function isVmRunning($runningVms, $uuid)
{
    return (bool) strstr(implode(' ', $runningVms), $uuid);
}
