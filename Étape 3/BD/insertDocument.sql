INSERT INTO `document`.`amis`
(`nom_amis`,
`utilisateur_nom_user`)
VALUES
(<{nom_amis: }>,
<{utilisateur_nom_user: }>);

INSERT INTO `document`.`document`
(`id`,
`nom_doc`,
`nom_user`,
`url_doc`)
VALUES
(<{id: }>,
<{nom_doc: }>,
<{nom_user: }>,
<{url_doc: }>);

INSERT INTO `document`.`document_favoris`
(`document_id`,
`favoris_id`)
VALUES
(<{document_id: }>,
<{favoris_id: }>);

INSERT INTO `document`.`document_utilisateur`
(`document_id`,
`utilisateur_nom_user`)
VALUES
(<{document_id: }>,
<{utilisateur_nom_user: }>);

INSERT INTO `document`.`favoris`
(`id`,
`nom_doc`,
`nom_user`)
VALUES
(<{id: }>,
<{nom_doc: }>,
<{nom_user: }>);

INSERT INTO `document`.`utilisateur`
(`nom_user`,
`email`,
`mot_passe`)
VALUES
(<{nom_user: }>,
<{email: }>,
<{mot_passe: }>);
