/*
 * Test DATA Insertion Script.
 */

DELETE FROM safari_points_of_interest;
DELETE FROM safari_waypoints;
DELETE FROM report;
DELETE FROM report_type;
DELETE FROM user_log;
DELETE FROM user;
DELETE FROM safari;
DELETE FROM media;


INSERT INTO media(type, url) VALUES ('image/jpeg', '/media/arusha_safari_header.jpg');
SET @arusha_safari_header_media_id = LAST_INSERT_ID();

INSERT INTO media(type, url) VALUES ('image/jpeg', '/media/arusha_safari_footer.jpg');
SET @arusha_safari_footer_media_id = LAST_INSERT_ID();

INSERT INTO media(type, url) VALUES ('image/jpeg', '/media/arusha_safari_tile.jpg');
SET @arusha_safari_tile_media_id = LAST_INSERT_ID();

INSERT INTO safari(name, description, header_media_id, footer_media_id, tile_media_id)
VALUES('Arusha Safari', 'Tour Arusha park.', @arusha_safari_header_media_id, @arusha_safari_footer_media_id, @arusha_safari_tile_media_id);



