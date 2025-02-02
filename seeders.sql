    INSERT INTO users (name,email, password_hash,role) VALUES
    ('Filan Fisteku','valon@gmail.com', '$2y$10$v7ALdBDH.fhh6Ta62RTxWOvKjNTJi3jXtuRLzhc7bko/3WMegoS4i','admin'),  -- 12345678
    ('John Doe','john@gmail.com', '$2y$10$v7ALdBDH.fhh6Ta62RTxWOvKjNTJi3jXtuRLzhc7bko/3WMegoS4i','user'),  -- 12345678
    ('Jane Doe','jane@gmail.com', '$2y$10$v7ALdBDH.fhh6Ta62RTxWOvKjNTJi3jXtuRLzhc7bko/3WMegoS4i','user');  -- 12345678

INSERT INTO cars (make, model, year, image, available) VALUES
('Ford', 'Mustang', 2020, 'mustang.jpg', TRUE),
('Chevrolet', 'Camaro', 2021, 'camaro.jpg', TRUE),
('BMW', 'M4', 2022, 'bmw_m4.jpg', TRUE),
('Audi', 'RS5', 2021, 'audi_rs5.jpg', TRUE),
('Mercedes-Benz', 'AMG GT', 2020, 'amg_gt.jpg', TRUE),
('Porsche', '911', 2021, 'porsche_911.jpg', TRUE),
('Lamborghini', 'Aventador', 2022, 'aventador.jpg', TRUE),
('Ferrari', '488', 2020, 'ferrari_488.jpg', TRUE),
('Jaguar', 'F-Type', 2021, 'jaguar_f-type.jpg', TRUE),
('Tesla', 'Model S', 2022, 'tesla_model_s.jpg', TRUE);

    INSERT INTO stages (Stage, SQ_FT, Dimensions, Grid_Height, Power, Office_Support, Specifications) VALUES
    (1, 38500, '154\' x 252\'', '45\'', '2000A 3ph 120/208v', 'N/A', 'Floorplan'),
    (2, 20000, '100\' x 200\'', '41\'', '4000A 3ph 120/208v', '13,500 sq/ft', 'Floorplan'),
    (3, 20000, '100\' x 200\'', '41\'', '4000A 3ph 120/208v', '13,500 sq/ft', 'Floorplan'),
    (4, 20000, '100\' x 200\'', '41\'', '4000A 3ph 120/208v', '13,500 sq/ft', 'Floorplan'),
    (5, 20000, '100\' x 200\'', '41\'', '4000A 3ph 120/208v', '13,500 sq/ft', 'Floorplan'),
    (6, 10000, '100\' x 100\'', 'N/A', 'Standard Construction', 'N/A', 'Floorplan'),
    (7, 20000, '100\' x 200\'', '41\'', '4000A 3ph 120/208v', '7,500 sq/ft', 'Floorplan'),
    (8, 10000, '100\' x 100\'', 'N/A', 'Standard Construction', 'N/A', 'Floorplan'),
    (9, 20000, '100\' x 200\'', '41\'', '4000A 3ph 120/208v', '13,500 sq/ft', 'Floorplan'),
    (10, 20000, '100\' x 200\'', 'N/A', '400A 3ph 120/208v', '13,500 sq/ft', 'Floorplan');

    