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



INSERT INTO MEDIA(type, url) VALUES ('image/jpeg', '/media/kilimanjaro_safari_header.jpg');
SET @kilimanjaro_safari_header_media_id = LAST_INSERT_ID();

INSERT INTO MEDIA(type, url) VALUES ('image/jpeg', '/media/kilimanjaro_safari_footer.jpg');
SET @kilimanjaro_safari_footer_media_id = LAST_INSERT_ID();

INSERT INTO MEDIA(type, url) VALUES ('image/jpeg', '/media/kilimanjaro_safari_tile.jpg');
SET @kilimanjaro_safari_tile_media_id = LAST_INSERT_ID();

INSERT INTO SAFARI(name, description, header_media_id, footer_media_id, tile_media_id)
VALUES('Kilimanjaro Safari', 'Tour Kilimanjaro.', @kilimanjaro_safari_header_media_id, @kilimanjaro_safari_footer_media_id, @kilimanjaro_safari_tile_media_id);



