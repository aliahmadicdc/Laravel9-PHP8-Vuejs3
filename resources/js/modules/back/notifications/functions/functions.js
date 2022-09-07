import {createRowData, createOptionData} from "../../../../core/services/functions/table/tableFunctions";

let data = []

export default function preFormatNotifications(notifications) {

    data = []

    notifications.forEach(function (value, index) {
        const temp = {
            data: [
                createRowData(value.data.title),
                createRowData(value.data.text),
                createRowData(value.updated_at),
                createRowData(t('COMPONENTS.TABLE.SEEN', {}, {locale: lang}), "true"),
            ],
            options: createOptionData()
        }

        data.push(temp)
    })

    return data
}
