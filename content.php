<?php

require 'vendor/autoload.php';

use Discord\Discord;

$token = 'MTEyNjQ5MDk0NzQxNzU0MjY3Nw.GQxFlW.kZ-U18-CAm94rh5Cppop-D1smvW_Q8RLGUunb4';
$serverId = '956361889380712489';

$discord = new Discord(['token' => $token]);
$guild = $discord->guilds->get('id', $serverId);
if (!$guild) {
    echo 'Serveur Discord non trouvé';
    exit;
}

$members = [];
foreach ($guild->members as $member) {
    $members[] = [
        'username' => $member->username,
        
        'discriminator' => $member->discriminator,
        'status' => $member->status
    ];

}

header('Content-Type: application/json');
echo json_encode($members);
?>