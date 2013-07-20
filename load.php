<?php
/**
 * Checks current directory for a running Vagrant virtual machine
 *
 * Author: John Kary <john@johnkary.net>
 */
$cwd = getcwd();
$uuid = getVagrantUuidInDir($cwd);

if (false === $uuid) {
    // No vagrant file in this dir
    exit(1);
}

$runningVms = getRunningVms();
if (!isVmRunning($runningVms, $uuid)) {
    // VM not running
    exit(1);
}

// VM running
exit(0);


function getVagrantUuidInDir($dir)
{
    $path = realpath($dir . '/.vagrant/machines/default/virtualbox/id');

    if (false === $path) {
        // File with UUID doesn't exist
        return false;
    }

    return file_get_contents($path);
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
