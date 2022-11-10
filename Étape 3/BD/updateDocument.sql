UPDATE `document`.`amis`
SET
`nom_amis` = <{nom_amis: }>,
`utilisateur_nom_user` = <{utilisateur_nom_user: }>
WHERE `nom_amis` = <{expr}>;

UPDATE `document`.`document`
SET
`id` = <{id: }>,
`nom_doc` = <{nom_doc: }>,
`nom_user` = <{nom_user: }>,
`url_doc` = <{url_doc: }>
WHERE `id` = <{expr}>;

UPDATE `document`.`document_favoris`
SET
`document_id` = <{document_id: }>,
`favoris_id` = <{favoris_id: }>
WHERE `document_id` = <{expr}> AND `favoris_id` = <{expr}>;

UPDATE `document`.`document_utilisateur`
SET
`document_id` = <{document_id: }>,
`utilisateur_nom_user` = <{utilisateur_nom_user: }>
WHERE `document_id` = <{expr}> AND `utilisateur_nom_user` = <{expr}>;

UPDATE `document`.`favoris`
SET
`id` = <{id: }>,
`nom_doc` = <{nom_doc: }>,
`nom_user` = <{nom_user: }>
WHERE `id` = <{expr}>;

UPDATE `document`.`utilisateur`
SET
`nom_user` = <{nom_user: }>,
`email` = <{email: }>,
`mot_passe` = <{mot_passe: }>
WHERE `nom_user` = <{expr}>;
