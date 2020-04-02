#!/usr/bin/env bash

LOG_DIR=$( cd "$( dirname "${BASH_SOURCE[1]}" )" && pwd )

HYPERF_LOG="$LOG_DIR/runtime/logs/hyperf.log"

deleteLog() {
      if [ -e ${HYPERF_LOG} ]; then
          echo > "${HYPERF_LOG}"
          echo "log delete"
      fi

}

deleteLog
