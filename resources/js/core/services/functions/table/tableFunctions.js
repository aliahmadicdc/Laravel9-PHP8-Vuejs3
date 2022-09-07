export function createRowData(data = '', isLabel = "false", labelType = 'success', isAction = "false") {
    return {
        data: data,
        isLabel: isLabel,
        labelType: labelType,
        isAction: isAction
    }
}

export function createOptionData(isEditActive = true, isDeleteActive = true) {
    return {
        editAction: isEditActive,
        deleteAction: isDeleteActive
    }
}
