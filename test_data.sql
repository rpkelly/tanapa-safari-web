/*
 * Test DATA Insertion Script.
 */

DELETE FROM SAFARI_POINTS_OF_INTEREST;
DELETE FROM SAFARI_WAYPOINTS;
DELETE FROM REPORT;
DELETE FROM REPORT_TYPE;
DELETE FROM USER_LOG;
DELETE FROM USER;
DELETE FROM SAFARI;
DELETE FROM MEDIA;


INSERT INTO REPORT_TYPE(name) VALUES('Poaching');
INSERt INTO REPORT_TYPE(name) VALUES('Animal Movement');


INSERT INTO MEDIA(type, url) VALUES ('image/jpeg', '/media/arusha_safari_header.jpg');
SET @arusha_safari_header_media_id = LAST_INSERT_ID();

INSERT INTO MEDIA(type, url) VALUES ('image/jpeg', '/media/arusha_safari_footer.jpg');
SET @arusha_safari_footer_media_id = LAST_INSERT_ID();

INSERT INTO MEDIA(type, url) VALUES ('image/jpeg', '/media/arusha_safari_tile.jpg');
SET @arusha_safari_tile_media_id = LAST_INSERT_ID();

INSERT INTO SAFARI(name, description, header_media_id, footer_media_id, tile_media_id)
VALUES('Arusha Safari', 'Tour Arusha park.', @arusha_safari_header_media_id, @arusha_safari_footer_media_id, @arusha_safari_tile_media_id);
SET @arusha_safari = LAST_INSERT_ID();


INSERT INTO MEDIA(type, url) VALUES ('image/jpeg', '/media/kilimanjaro_safari_header.jpg');
SET @kilimanjaro_safari_header_media_id = LAST_INSERT_ID();

INSERT INTO MEDIA(type, url) VALUES ('image/jpeg', '/media/kilimanjaro_safari_footer.jpg');
SET @kilimanjaro_safari_footer_media_id = LAST_INSERT_ID();

INSERT INTO MEDIA(type, url) VALUES ('image/jpeg', '/media/kilimanjaro_safari_tile.jpg');
SET @kilimanjaro_safari_tile_media_id = LAST_INSERT_ID();

INSERT INTO SAFARI(name, description, header_media_id, footer_media_id, tile_media_id)
VALUES('Kilimanjaro Safari', 'Tour Kilimanjaro.', @kilimanjaro_safari_header_media_id, @kilimanjaro_safari_footer_media_id, @kilimanjaro_safari_tile_media_id);
SET @kilimanjaro_safari = LAST_INSERT_ID();

INSERT INTO SAFARI_WAYPOINTS(sequence, latitude, longitude, safari_id) 
	VALUES ('1', '34.684887', '-82.842777', @arusha_safari);
INSERT INTO SAFARI_WAYPOINTS(sequence, latitude, longitude, safari_id) 
	VALUES ('0', '34.681217', '-82.842434', @arusha_safari);
INSERT INTO SAFARI_WAYPOINTS(sequence, latitude, longitude, safari_id) 
	VALUES ('2', '34.683787', '-82.842875', @arusha_safari);
INSERT INTO SAFARI_WAYPOINTS(sequence, latitude, longitude, safari_id) 
	VALUES ('3', '34.680887', '-82.842077', @arusha_safari);
INSERT INTO SAFARI_WAYPOINTS(sequence, latitude, longitude, safari_id) 
	VALUES ('4', '34.674887', '-82.832777', @arusha_safari);
INSERT INTO SAFARI_WAYPOINTS(sequence, latitude, longitude, safari_id) 
	VALUES ('6', '34.674897', '-82.842004', @arusha_safari);
INSERT INTO SAFARI_WAYPOINTS(sequence, latitude, longitude, safari_id) 
	VALUES ('7', '34.681990', '-82.841707', @arusha_safari);
INSERT INTO SAFARI_POINTS_OF_INTEREST(name, safari_id, latitude, longitude, radius) 
	VALUES ('McAdams Hall', @arusha_safari, '34.675937', '-82.834018', '50');
