echo S3_ENDPOINT=${S3_ENDPOINT} >> .env
echo S3_KEY=${S3_KEY} >> .env
echo S3_SECRET=${S3_SECRET} >> .env
echo S3_ESIGN_BUCKET=${S3_ESIGN_BUCKET} >> .env
echo REDIRECT_URL=${REDIRECT_URL} >> .env
echo DB_HOST=${DB_HOST} >> .env
echo DB_PORT=${DB_PORT} >> .env
echo DB_NAME=${DB_NAME} >> .env
echo DB_USER=${DB_USER} >> .env
echo DB_PASS=${DB_PASS} >> .env
apache2-foreground