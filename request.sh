#!/bin/bash

if [ -z "$1" ]; then
  echo "Please provide a number of lines to csv"
  exit 1
fi

REQUEST=$1

ENDPOINTS=(
  "127.0.0.1:1000/php56/csv/$REQUEST"
  "127.0.0.1:1000/php74/csv/$REQUEST"
  "127.0.0.1:1000/php80-nojit/csv/$REQUEST"
  "127.0.0.1:1000/php80-jit/csv/$REQUEST"
  "127.0.0.1:1000/php81-jit/csv/$REQUEST"
  "127.0.0.1:1000/php82-jit/csv/$REQUEST"
  "127.0.0.1:1000/php83-jit/csv/$REQUEST"
)

PHP_VERSIONS=(
  "PHP 5.6"
  "PHP 7.4"
  "PHP 8.0 (no JIT)"
  "PHP 8.0 (JIT)"
  "PHP 8.1 (JIT)"
  "PHP 8.2 (JIT)"
  "PHP 8.3 (JIT)"
)

EXECUTION_TIME=()
LINES=()

for i in "${!ENDPOINTS[@]}"; do
  echo "Request to ${PHP_VERSIONS[i]} (${ENDPOINTS[i]})"
  RESPONSE=$(curl --location --silent --show-error "${ENDPOINTS[i]}")

  EXEC_TIME=$(echo "$RESPONSE" | jq -r '.execution_time_s')
  if [ "$EXEC_TIME" == "null" ]; then
    EXEC_TIME="N/A"
  else
    EXEC_TIME=$(printf "%.6f" "$EXEC_TIME")
  fi
  EXECUTION_TIME+=("$EXEC_TIME")

  LINES+=($(echo "$RESPONSE" | jq -r '.lines'))
done

echo
echo "+-----------------------+---------------------+------------------+"
echo "| PHP Version           | Execution Time (s)  | Lines            |"
echo "+-----------------------+---------------------+------------------+"

for i in "${!PHP_VERSIONS[@]}"; do
  printf "| %-21s | %-19s | %-16s |\n" "${PHP_VERSIONS[i]}" "${EXECUTION_TIME[i]}" "${LINES[i]}"
done

echo "+-----------------------+---------------------+------------------+"
