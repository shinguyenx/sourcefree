SELECT zin_history_id, 
zin_user_ref,
zin_product_ref,
zin_history_total, 
zin_history_description,
zin_history_type 
  FROM zin_history;
SELECT 
zin_product_id, 
zin_product_name, 
zin_product_price, 
zin_product_time_updated, 
zin_product_description 
  FROM zin_product;
SELECT zin_user_id, zin_user_nickname, zin_user_username, zin_user_password, zin_user_description, zin_user_level 
  FROM zin_user;

