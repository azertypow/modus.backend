<?php
return function($kirby, $pages, $page) {

    $alert = null;

    if($kirby->request()->is('POST')) {

        $data = [
            'nom'           => get('nom'),
            'prenom'        => get('prenom'),
            'institution'   => get('institution'),
            'email'         => get('email'),
            'nomProjet'     => get('nomProjet'),
            'description'   => get('description'),
        ];

        $rules = [
            'email'     => ['required', 'email'],
//            'message'   => ['required', 'minLength' => 0, 'maxLength' => 3000],
        ];

        $messages = [
            'email'      => 'Entrez une adresse mail valide',
//            'message'    => 'Please enter a text between 0 and 3000 characters'
        ];

        // some of the data is invalid
        if($invalid = invalid($data, $rules, $messages)) {
            $alert = $invalid;

            // the data is fine, let's send the email
        } else {
            try {
                $nom            = esc($data['nom']);
                $prenom         = esc($data['prenom']);
                $institution    = esc($data['institution']);
                $email          = esc($data['email']);
                $nomProjet      = esc($data['nomProjet']);
                $description    = esc($data['description']);

                $kirby->email([
                    'from'     => 'webmaster@modus-admin.sdrvl.ch',
                    'to'       => [
                        'azertypow@icloud.com',
                        'info@modus-ge.ch',
                    ],
                    'body'     =>
                        "Nouvelle prise de contact de $nom $prenom:"
                        ."\n\nNOM\n$nom"
                        ."\n\nPRÉNOM\n$prenom"
                        ."\n\nINSTITUTION\n$institution"
                        ."\n\nEMAIL\n$email"
                        ."\n\nTITRE DU PROJET\n$nomProjet"
                        ."\n\nDESCRIPTION\n$description"
                    ,
                    'replyTo'  => $email,
                    'subject'  => 'contact modus-ge.ch | ' . $nom . $prenom . " vous a envoyé un message depuis l'application web modus-ge.ch",
                ]);

            } catch (Exception $error) {
                if(option('debug')):
                    $alert['error'] = 'The form could not be sent: <strong>' . $error->getMessage() . '</strong>';
                else:
                    $alert['error'] = 'The form could not be sent!';
                endif;
            }

            // no exception occurred, let's send a success message
            if (empty($alert) === true) {
                $success = 'Votre message a bien été envoyé. Nous revenons vers vous au plus vite.';
                $data = [];
            }
        }
    }

    return [
        'alert'   => $alert,
        'data'    => $data ?? false,
        'success' => $success ?? false,
    ];
};
