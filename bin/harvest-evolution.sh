#!/bin/sh
MAILDIR=${HOME}/.local/share/evolution/mail/local
MAILBOXDIR=bedrijven
# MAILBOXDIR=remote
MAILBOXMASK=${MAILDIR}/..${MAILBOXDIR}*/cur/*.asus-p5w-dh-deluxe:2,*
TMPDIR=${HOME}/workspace/saas/storage/app/harvest
rm ${TMPDIR}/${MAILBOXDIR}.txt
ls ${MAILBOXMASK} | xargs -n1 -d '\n' sed -n '/From: /p' - | sed '/noud/d' - | sed '/Mail Delivery System/d' - | sed '/not-reply/d' - | sed '/no-reply/d' - | sed '/noreply/d' - | sort - | uniq - | grep '@' - | grep '^From: ' - | cut -c 7- - >> ${TMPDIR}/${MAILBOXDIR}.txt