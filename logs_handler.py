import sql_bridge

def entry_create(severity):
    match severity:
        case 'notice':
            log_level = 0
            sql_bridge.Db_Insert(severity, "logs", "fields", "char")

        case 'notice':
            log_level = 1

        case 'warning':
            log_level = 2

        case 'critical':
            log_level = 3
