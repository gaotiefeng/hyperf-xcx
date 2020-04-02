#!/usr/bin/env bash

LOG_DIR=$( cd "$( dirname "${BASH_SOURCE[1]}" )" && pwd )

HYPERF_LOG="$LOG_DIR/runtime/logs/hyperf.log"

deleteLog() {
      echo > "${HYPERF_LOG}"
      if [ -s ${HYPERF_LOG} ]; then
          echo "${HYPERF_LOG}->文件已经清空"
      fi
}

deleteLog
