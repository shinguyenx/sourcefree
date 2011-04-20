UPDATE zin_history SET 
  zin_user_ref = ?, 
  zin_product_ref = ?, 
  zin_history_total = ?, 
  zin_history_description = ?, 
  zin_history_type = ? 
WHERE
  zin_history_id = ?;
UPDATE zin_product SET 
  zin_product_name = ?, 
  zin_product_price = ?, 
  zin_product_time_updated = ?, 
  zin_product_description = ? 
WHERE
  zin_product_id = ?;
UPDATE zin_user SET 
  zin_user_nickname = ?, 
  zin_user_username = ?, 
  zin_user_password = ?, 
  zin_user_description = ?, 
  zin_user_level = ? 
WHERE
  zin_user_id = ?;

