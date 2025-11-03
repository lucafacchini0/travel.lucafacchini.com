-- EXAMPLE DATABASE.

CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(500) NOT NULL,
    tags VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO posts (title, description, image, tags) VALUES 
(
    'Tramonto sul mare',
    'Un bellissimo tramonto catturato sulla costa italiana. I colori del cielo si riflettono sull\'acqua creando uno spettacolo unico.',
    'https://images.unsplash.com/photo-1506905925346-21bda4d32df4',
    'natura, mare, fotografia'
),
(
    'Montagne innevate',
    'Le Alpi italiane in tutto il loro splendore invernale. Un paesaggio mozzafiato che ispira avventura e tranquillità.',
    'https://images.unsplash.com/photo-1519904981063-b0cf448d479e',
    'montagna, inverno, paesaggio'
),
(
    'Città al tramonto',
    'Lo skyline di una città moderna illuminato dai raggi del sole al tramonto. Architettura e natura in perfetta armonia.',
    'https://images.unsplash.com/photo-1480714378408-67cf0d13bc1b',
    'città, urbano, architettura'
);