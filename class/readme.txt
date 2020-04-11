select etudiants as e inner join units as u xhere e.unit and e.prenom 

select from etudiant as e innerjoin units as u  on e.unit = u.id

select * from etudiants as e inner join units as  un on un.id=e.unit innerjoin anne as a on e.annee = a.id

select tble1 innerjoin table2 AS T2  on WHERE ID.UTILISATEUR=""

SELECT* FROM utilisateurs INNER JOIN articles on articles.id_utilisateur = utilisateurs.id INNER JOIN commentaires ON commentaires.id_utilisateur = utilisateurs.id WHERE utilisateurs.id = 1341

SELECT* FROM utilisateurs as u INNER JOIN articles as art on art.id_utilisateur = u.id INNER JOIN commentaires as com ON com.id_utilisateur = u.id WHERE u.id = 1341