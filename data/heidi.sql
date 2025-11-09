USE sim_note;
SELECT id, title,content, updated_at, is_save FROM notes 
WHERE is_save = 0, user_id = 2;
ORDER BY updated_at DESC
LIMIT 10;